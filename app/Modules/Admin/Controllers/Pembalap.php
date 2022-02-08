<?php

namespace App\Modules\Admin\Controllers;

use App\Controllers\BaseController;
use App\Modules\Admin\Models\PembalapModel;
use App\ThirdParty\fpdf\FPDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class Pembalap extends BaseController
{
    public function index()
    {
        $model = new PembalapModel();

        $data = [
            'title' => "Pembalap",
            'pembalap' => $model->getData(),
        ];

        echo view("App\Modules\Admin\Views\Pembalap\pembalap", $data);
    }

    public function detail($slug)
    {
        $model = new PembalapModel();

        $data = [
            'title' => "Detail Pembalap",
            'pembalap' => $model->getData($slug)
        ];

        return view("App\Modules\Admin\Views\Pembalap\detail_pembalap", $data);
    }

    public function tambah()
    {
        // $team = new TeamModel();
        $pembalap = new PembalapModel();

        $data = [
            'title' => 'Tambah Data',
            'team' => $pembalap->getTeam(),
            'kelas_balap' => $pembalap->getKelasbalap(),
            'validation' => \Config\Services::validation()
        ];

        return view("App\Modules\Admin\Views\Pembalap/tambah_pembalap", $data);
    }

    public function simpan()
    {
        $model = new PembalapModel();
        $slug = url_title($this->request->getVar('nama'), '-', true);

        if (!$this->validate([
            'no_balap' => [
                'rules' => 'required|is_natural|is_unique[pembalap.no_balap]',
                'errors' => [
                    'required' => 'No balap wajib diisi',
                    'is_natural' => 'No balap harus diisi dengan bilangan bulat',
                    'is_unique' => 'No balap tidak boleh sama'
                ]
            ],
            'nama' => [
                'rules' => 'required|is_unique[pembalap.nama]',
                'errors' => [
                    'required' => 'Nama wajib diisi',
                    'is_unique' => 'Nama tidak boleh sama'
                ]
            ],
            'tanggal_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tempat lahir wajib diisi'
                ]
            ],
            'tanggal_lahir' => [
                'rules' => 'required|valid_date[Y-m-d]',
                'errors' => [
                    'required' => 'Tanggal lahir wajib diisi',
                    'valid_date' => 'Format tanggal salah'
                ]
            ],
            'foto' => [
                'rules' => 'max_size[foto,5120]|is_image[foto]|mime_in[foto,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ],
            'negara' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Negara harus diisi'
                ]
            ]
        ])) {
            session()->setFlashdata('failed', 'Data gagal disimpan');
            return redirect()->to('admin/pembalap/tambah')->withInput();
        }

        $fileFoto = $this->request->getFile('foto');

        if ($fileFoto->getError() == 4) {
            $namaFile = 'foto-default.png';
        } else {
            $namaFile = $fileFoto->getRandomName();
            $path = FCPATH . 'img';
            $fileFoto->move($path, $namaFile);
        }

        $dataSimpan = [
            'no_balap' => $this->request->getVar('no_balap'),
            'nama' => $this->request->getVar('nama'),
            'slug' => $slug,
            'id_team' => $this->request->getVar('team'),
            'id_kelasbalap' => $this->request->getVar('kelas_balap'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'foto' => $namaFile,
            'negara' => $this->request->getVar('negara')
        ];


        $model->tambah($dataSimpan);
        session()->setFlashdata('success', 'Data Berhasil Ditambahkan');

        return redirect()->to('admin/pembalap');
    }

    public function edit($slug)
    {
        $pembalap = new PembalapModel();

        $data = [
            'title' => 'Edit Data',
            'pembalap' => $pembalap->getData($slug),
            'team' => $pembalap->getTeam(),
            'kelas_balap' => $pembalap->getKelasbalap(),
            'validation' => \Config\Services::validation()
        ];

        echo view('App\Modules\Admin\Views\Pembalap\update_pembalap', $data);
    }

    public function update($no_balap)
    {
        $model = new PembalapModel();
        $slug = url_title($this->request->getVar('nama'), '-', true);

        if (!$this->validate([
            'no_balap' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No balap wajib diisi',
                ]
            ],
            'nama' => [
                'rules' => 'required|is_unique[pembalap.nama]',
                'errors' => [
                    'required' => 'Nama wajib diisi',
                    'is_unique' => 'Nama tidak boleh sama'
                ]
            ],
            'tanggal_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tempat lahir wajib diisi'
                ]
            ],
            'tanggal_lahir' => [
                'rules' => 'required|valid_date[Y-m-d]',
                'errors' => [
                    'required' => 'Tanggal lahir wajib diisi',
                    'valid_date' => 'Format tanggal salah'
                ]
            ],
            'foto' => [
                'rules' => 'max_size[foto, 5120]|is_image[foto]|mime_in[foto,image/png,image/jpg,image/jpeg]',
                'errors' => [

                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ],
            'negara' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Negara harus diisi'
                ]
            ]
        ])) {
            session()->setFlashdata('failed', 'Data gagal diubah');
            return redirect()->to('admin/pembalap/edit' . '/' . $this->request->getVar('slug'))->withInput();
        }

        $fileFoto = $this->request->getFile('foto');

        if ($fileFoto->getError() == 4) {
            $namaFoto = $this->request->getVar('fotoLama');
        } else {
            $namaFoto = $fileFoto->getRandomName();
            $path = FCPATH . 'img';
            $fileFoto->move($path, $namaFoto);
        }
        $dataUpdate = [
            'no_balap' => $no_balap,
            'nama' => $this->request->getVar('nama'),
            'slug' => $slug,
            'id_team' => $this->request->getVar('team'),
            'id_kelasbalap' => $this->request->getVar('kelas_balap'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'foto' => $namaFoto,
            'negara' => $this->request->getVar('negara')
        ];

        $model->editData($no_balap, $dataUpdate);
        session()->setFlashdata('success', 'Data Berhasil Diubah');

        return redirect()->to('admin/pembalap' . '/' . $slug);
    }

    public function hapus($no_balap)
    {
        $model = new PembalapModel();
        $pembalap = $model->find($no_balap);

        $path = FCPATH . 'img/';

        if ($pembalap['foto'] != 'foto-default.png') {
            unlink($path . $pembalap['foto']);
        }

        $model->delete($no_balap);

        session()->setFlashdata('success', 'Data Berhasil Dihapus');

        return redirect()->to('admin/pembalap');
    }

    public function printPDF()
    {
        $model = new PembalapModel();

        $pdf = new FPDF();
        $pdf->SetTitle('Data Pembalap');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(190, 10, 'DATA PEMBALAP', 0, 1, 'C');

        $pdf->Cell(10, 7, '', 0, 1);

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(20, 6, 'No. Balap', 1, 0, 'C');
        $pdf->Cell(44, 6, 'Nama', 1, 0, 'C');
        $pdf->Cell(44, 6, 'Team', 1, 0, 'C');
        $pdf->Cell(30, 6, 'Kelas Balap', 1, 0, 'C');
        $pdf->Cell(30, 6, 'Tanggal Lahir', 1, 0, 'C');
        $pdf->Cell(20, 6, 'Foto', 1, 1, 'C');

        $pembalap = $model->getData();
        foreach ($pembalap as $p) :
            $pdf->Cell(20, 20, $p['no_balap'], 1, 0, 'C');
            $pdf->Cell(44, 20, $p['nama'], 1, 0, 'C');
            $pdf->Cell(44, 20, $p['nama_team'], 1, 0, 'C');
            $pdf->Cell(30, 20, $p['nama_kelasbalap'], 1, 0, 'C');
            $pdf->Cell(30, 20, $p['tanggal_lahir'], 1, 0, 'C');

            $img = base_url('/img') . '/' . $p['foto'];
            $pdf->Cell(20, 20, $pdf->Image($img, $pdf->GetX(), $pdf->GetY(), 20), 1, 1);
        endforeach;

        $pdf->Output($dest = 'I', $name = 'data-pembalap.pdf');
        exit;
    }

    public function printWord()
    {
        $model = new PembalapModel();

        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
        $tittle = array('size' => 16, 'bold' => true);
        $section->addText('Laporan Data Pembalap', $tittle);
        $section->addTextBreak(1);

        $styleTable = array('borderSize' => 6, 'borderColor' => '006699', 'cellMargin' => 80);
        $styleCell = array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'valign' => 'center');
        $fontHeader = array('bold' => true);
        $noSpace = array('spaceAfter' => 0);
        $imgStyle = array('widht' => 50, 'height' => 50);

        $phpWord->addTableStyle('mytable', $styleTable);

        $table = $section->addTable('mytable');
        $table->addRow();
        $table->addCell(500, $styleCell)->addText('No. Balap', $fontHeader, $noSpace);
        $table->addCell(2000, $styleCell)->addText('Nama', $fontHeader, $noSpace);
        $table->addCell(2000, $styleCell)->addText('Team', $fontHeader, $noSpace);
        $table->addCell(1500, $styleCell)->addText('Kelas Balap', $fontHeader, $noSpace);
        $table->addCell(1500, $styleCell)->addText('Tanggal Lahir', $fontHeader, $noSpace);
        $table->addCell(1000, $styleCell)->addText('Foto', $fontHeader, $noSpace);

        $pembalap = $model->getData();
        foreach ($pembalap as $p) :
            $table->addRow();
            $table->addCell(500, $styleCell)->addText($p['no_balap'], array(), $noSpace);
            $table->addCell(1000, $styleCell)->addText($p['nama'], array(), $noSpace);
            $table->addCell(1000, $styleCell)->addText($p['nama_team'], array(), $noSpace);
            $table->addCell(1000, $styleCell)->addText($p['nama_kelasbalap'], array(), $noSpace);
            $table->addCell(1000, $styleCell)->addText($p['tanggal_lahir'], array(), $noSpace);
            $table->addCell(1000, $styleCell)->addImage(base_url('/img') . '/' . $p['foto'], $imgStyle);
        endforeach;

        $filename = "data-pembalap.docx";
        header('Content-Type: application/msword');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = IOFactory::createWriter($phpWord, 'Word2007');
        $writer->save('php://output');
        exit;
    }

    public function printExcel()
    {
        $model = new PembalapModel();
        $spreadsheet = new Spreadsheet();

        $spreadsheet->setActiveSheetIndex(0)->setCellValue('A2', 'Laporan Data Pembalap');
        $spreadsheet->getActiveSheet()->getStyle('A2')->getFont()->setSize(13);
        $spreadsheet->getActiveSheet()->mergeCells('A2:F2');
        $spreadsheet->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->getStyle('A2')->getAlignment()->setVertical('center');

        $spreadsheet->getActiveSheet()
            ->setCellValue('A4', 'No. Balap')
            ->setCellValue('B4', 'Nama')
            ->setCellValue('C4', 'Team')
            ->setCellValue('D4', 'Kelas Balap')
            ->setCellValue('E4', 'Tanggal Lahir')
            ->setCellValue('F4', 'Foto');

        $spreadsheet->getActiveSheet()->getStyle('A1:F4')->getFont()->setBold(true);

        $pembalap = $model->getData();
        $row = 5;
        foreach ($pembalap as $p) :
            $spreadsheet->getActiveSheet()
                ->setCellValue('A' . $row, $p['no_balap'])
                ->setCellValue('B' . $row, $p['nama'])
                ->setCellValue('C' . $row, $p['nama_team'])
                ->setCellValue('D' . $row, $p['nama_kelasbalap'])
                ->setCellValue('E' . $row, $p['tanggal_lahir']);

            $objDrawing = new Drawing();
            $objDrawing->setPath(base_url('/img') . '/' . $p['foto']);
            $objDrawing->setCoordinates('F' . $row);
            $objDrawing->setOffsetX(5);
            $objDrawing->setOffsetY(5);
            $objDrawing->setWidth(50);
            $objDrawing->setWidth(50);
            // masih error
            // $objDrawing->setWorksheet($spreadsheet->getActiveSheet());

            $spreadsheet->getActiveSheet()->getRowDimension($row)->setRowHeight(50);
            $row++;
        endforeach;

        foreach (range('A', 'F') as $column) :
            $spreadsheet->getActiveSheet()->getColumnDimension($column)->setAutoSize(true);
        endforeach;

        $border = array(
            'allBorders' => array(
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
            )
        );
        $spreadsheet->getActiveSheet()->getStyle('A4' . ':F' . ($row - 1))->getBorders()->applyFromArray($border);

        $alignment = array(
            'alignment' => array(
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            )
        );
        $spreadsheet->getActiveSheet()->getStyle('A4' . ':F4' . ($row - 1))->applyFromArray($alignment);

        $filename = 'data-pembalap.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $objWriter = new Xlsx($spreadsheet);
        $objWriter->save('php://output');
        exit;
    }
}
