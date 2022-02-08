<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------

    // public $formSimpanData = [
    //     'no_balap' => 'required|is_natural|is_unique[pembalap.no_balap]',
    //     'nama' => 'required|is_unique[pembalap.nama]',
    //     'tempat_lahir' => 'required',
    //     'tanggal_lahir' => 'required|valid_date[Y-m-d]',
    //     'foto' => 'max_size[foto, 5120]|is_image[foto]|mime_in[foto,image/png,image/jpg]',
    //     'negara' => 'required'
    // ];

    // public $formSimpanData_errors = [
    //     'no_balap' => [
    //         'required' => 'No balap wajib diisi',
    //         'is_natural' => 'No balap harus diisi dengan bilangan bulat',
    //         'is_unique' => 'No balap tidak boleh sama'
    //     ],
    //     'nama' => [
    //         'required' => 'Nama wajib diisi',
    //         'is_unique' => 'Nama tidak boleh sama'
    //     ],
    //     'tempat_lahir' => [
    //         'required' => 'Tempat lahir wajib diisi'
    //     ],
    //     'tanggal_lahir' => [
    //         'required' => 'Tanggal lahir wajib diisi',
    //         'valid_date' => 'Format tanggal salah'
    //     ],
    //     'foto' => [
    //         'max_size' => 'Ukuran gambar terlalu besar',
    //         'is_image' => 'Yang anda pilih bukan gambar',
    //         'mime_in' => 'Yang anda pilih bukan gambar'
    //     ],
    //     'negara' => [
    //         'required' => 'Negara harus diisi'
    //     ]
    // ];

    // public $formUpdateData = [
    //     'no_balap' => 'required|is_natural',
    //     'nama' => 'required',
    //     'tempat_lahir' => 'required',
    //     'tanggal_lahir' => 'required|valid_date[Y-m-d]',
    //     'negara' => 'required'
    // ];

    // public $formUpdateData_errors = [
    //     'no_balap' => [
    //         'required' => 'No balap wajib diisi',
    //         'is_natural' => 'No balap harus diisi dengan bilangan bulat',
    //     ],
    //     'nama' => [
    //         'required' => 'Nama wajib diisi'
    //     ],
    //     'tempat_lahir' => [
    //         'required' => 'Tempat lahir wajib diisi'
    //     ],
    //     'tanggal_lahir' => [
    //         'required' => 'Tanggal lahir wajib diisi',
    //         'valid_date' => 'Format tanggal salah'
    //     ],
    //     'negara' => [
    //         'required' => 'Negara harus diisi'
    //     ]
    // ];

    public $formSimpanTeam = [
        'nama_team' => 'required|is_unique[team.nama_team]',
    ];

    public $formSimpanTeam_errors = [
        'nama_team' => [
            'required' => 'Nama wajib diisi',
            'is_unique' => 'Nama tidak boleh sama'
        ],
    ];

    public $formSimpanUpdate = [
        'nama_team' => 'required',
    ];

    public $formSimpanUpdate_errors = [
        'nama_team' => [
            'required' => 'Nama wajib diisi',
        ],
    ];
}
