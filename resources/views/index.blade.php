@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">

@endsection

@section('content')
    <div class="content index-section">
        <div class="row no-gutters w-100 text-left section-1" id="section1">
            <div class="col-md-12 col-xs-12">
                <p class="index-title">EzDental</p>
                <p class="index-subtitle">SISTEM PENGURUSAN MAKLUMAT BAGI UNIT PROSTODONTIK <br> UNIVERSITI KEBANGSAAN MALAYSIA <br> KID 2020/2021</p>
                <a href="#section2" class="btn btn-success px-5 mt-3">Find Out More!</a>
                <a href="{{route('login')}}" class="btn btn-outline-success index-login ml-2 px-5 mt-3">Login</a>
            </div>
        </div>
        <div class="row no-gutters section-2" id="section2">
            <div class="col-md-12 p-0">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row p-5">
                                <div class="col-md-10 offset-md-1">
                                    <p class="text-title text-left">Apakah itu EzDental?</p>
                                    <p class="text-justify text-subtitle">EzDental merupakan sebuah sistem pengurusan maklumat yang dibangunkan berdasarkan keperluan dan kajian yang dilakukan terhadap
                                        sebuah unit di Fakulti Pergigian Universiti Kebangsaan Malaysia iaitu Unit Prostodontik. Sebuah temubual dan juga mengkaji dokumen telah
                                        memberikan lebih banyak maklumat berkaitan permasalahan dihadapi oleh mereka. Dengan bantuan dan panduan yang diberikan oleh Dr. Goo Chui Ling dan juga Cik Shahidah Shahidan,
                                        lebih banyak perkara dapat difahami terutamanya yang melibatkan pergigian prostetik. Sistem ini dilengkapi dengan fungsi yang dapat membantu pihan Unit Prostodontik untuk
                                        menguruskan maklumat lebih tersusun dan sistematik justeru dapat menggantikan kaedah yang digunapakai sekarang. Dilengkapi juga dengan algoritma dalam pemilihan secara pintar terhadap
                                        juruteknik yang perlu dipilih bagi srtiap kes baharu.
                                    </p>
                                    <p class="text-justify text-subtitle">
                                        Berpandukan model 'Waterfall' sebagai metodologi pembangunan projek ini, setiap fasa pembangunan perisian dapat dilakukan dengan cermat dan secara terperinci. Metodologi yang sangat
                                        tersusun dan berstruktur dapat membantu memudahkan tugas pembangunan setiap modul secara berperingkat dalam masa yang sama dapat mengurangkan risiko - risiko dan juga mengurangkan kadar
                                        kegagalan ketika proses pembangunan perisian ini.
                                    </p>
                                    <a href="#section2-2" class="btn btn-outline-success float-right">Next...</a>
                                    {{-- <p class="text-left text-subtitle">Project Scope :</p>
                                    <div class="row pt-5">
                                        <div class="col-md-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-journal-plus" viewBox="0 0 16 16 ">
                                                <path fill-rule="evenodd" d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5z"/>
                                                <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                                                <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                                            </svg>
                                            <p class="mt-3 font-weight-bold">Case Registration</p>
                                        </div>
                                        <div class="col-md-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-journal-check" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                                <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                                                <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                                            </svg>
                                            <p class="mt-3 font-weight-bold">Case Verification</p>
                                        </div>
                                        <div class="col-md-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                            </svg>
                                            <p class="mt-3 font-weight-bold">Case Assignation</p>
                                        </div>
                                        <div class="col-md-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                            </svg>
                                            <p class="mt-3 font-weight-bold">Record Management</p>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row no-gutters section2-2" id="section2-2">
            <div class="col-md-4" id="problem">
                <div class="section2-2-title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="140" height="140" fill="#ECF0F1" class="bi bi-question-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                    </svg>
                    <p class="mt-3">Pernyataan Masalah</p>
                </div>
                <div class="text-justify p-5 section-2-2-content">
                    <ul>
                        <li><p class="content">Keitdakbolehan dalam mempelajari penggunaan Google Workspace sebagai medium pengurusan maklumat.</p></li>
                        <li><p class="content">Sistem Maklumat sedia ada tidak mempunyai pangkalan data yang tersusun dan sistematik.</p></li>
                        <li><p class="content">Kesukaran dalam pembahagian kes baharu kepada juruteknik.</p></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4" id="objective">
                <div class="section2-2-title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="140" height="140" fill="#ECF0F1" class="bi bi-check2-circle" viewBox="0 0 16 16">
                        <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                        <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                      </svg>
                    <p class="mt-3">Objektif</p>
                </div>
                <div class="text-justify p-5 section-2-2-content">
                    <ul>
                        <li><p class="content">Membolehkan pengguna untuk mendaftarkan kes baharu ke sistem.</p></li>
                        <li><p class="content">Membenarkan kerani dan ketua juruteknik untuk melakukan pengesahan terhadap kes baharu.</p></li>
                        <li><p class="content">Membolehkan ketua juruteknik untuk membahagikan kes baharu kepada juruteknik secara adil.</p></li>
                        <li><p class="content">Membenarkan pengguna untuk melihat dan mengurus rekod kes prostetik.</p></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4" id="scope">
                <div class="section2-2-title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="140" height="140" fill="#ECF0F1" class="bi bi-box-seam" viewBox="0 0 16 16">
                        <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
                      </svg>
                    <p class="mt-3">Skop Projek</p>
                </div>
                <div class="text-center p-5 section-2-2-content">
                    <ul>
                        <li><p class="content">Hanya melibatkan juruteknik dan kerani daripada Unit Prostodontik Fakulti Pergigian UKM dan pelajar dan doktor gigi daripada Fakulti Pergigian UKM.</p></li>
                        <li><p class="content">Hanya memfokuskan dalam menyelesaikan permasalahan dan mencapai objektif projek.</p></li>
                    </ul>
                    <a href="#section3" class="btn btn-outline-light mt-5 mr-2 float-right">Continue...</a>
                </div>

            </div>

        </div>
        <div class="row no-gutters section-3" id="section3">
           <div class="col-md-12">
               <div class="row align-items-center pt-5 mb-5">
                   <p class="col-md-12 title">KELEBIHAN SISTEM</p>
               </div>
               <div class="row feature">
                <div class="col-md-3">
                    <div class="card feature-card">
                        <div class="card-body" id="feature_1">
                            <div id="img_1" class="feature-img"></div>
                            <div class="number">
                                1
                            </div>
                            <div class="details">
                               <p><strong>PENDAFTARAN KES BAHARU</strong> <br> Membolehkan pengguna untuk mendaftarkan kes melalui e-borang yang disediakan juga dilengkapi dengan fungsi kiraan beban kerja secara automatik.</p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card feature-card">
                        <div class="card-body" id="feature_2">
                            <div id="img_2" class="feature-img"></div>
                            <div class="number">
                                2
                            </div>
                            <div class="details">
                               <p><strong>PENGESAHAN KES BAHARU</strong> <br> Kerani dan ketua juruteknik boleh melakukan semak semula terhadap kes baharu dan boleh buat pengesahan setelah pasti masklumat semua adalah tepat.</p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card feature-card">
                        <div class="card-body" id="feature_3">
                            <div id="img_3" class="feature-img"></div>
                            <div class="number">
                                3
                            </div>
                            <div class="details">
                               <p><strong>Pembahagian Kes</strong> <br> Pembahagian kes secara automatik boleh dilakukan oleh ketua juruteknik dengan hanya satu klik butang sahaja.</p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card feature-card">
                        <div class="card-body" id="feature_4">
                            <div id="img_4" class="feature-img"></div>
                            <div class="number">
                                4
                            </div>
                            <div class="details">
                               <p><strong>Pengurusan Rekod</strong> <br>Jimatkan masa dalam pencarian maklumat mengenai kes - kes prostetik.</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5 pt-5">
                <div class="col-md-12"><a href="#section5" class="btn btn-success">More...</a></div>
            </div>

           </div>

        </div>

        <div class="row no-gutters section-5 p-5" id="section5">
            <div class="col-md-12 text-center pt-5">
                <span class="text-center text-title mt-5">Perbandingan Sistem</span>
                <div class="card mt-5">
                    <div class="card-body p-0">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Sistem Sedia Ada</th>
                                    <th scope="col">VS</th>
                                    <th scope="col">EzDental</th>
                                </tr>
                            </thead>
                            <tr>
                                <td>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="red" class="bi bi-x" viewBox="0 0 16 16">
                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </td>
                                <td>Pengesahan Pengguna</td>
                                <td>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="green" class="bi bi-check" viewBox="0 0 16 16">
                                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                    </svg>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="red" class="bi bi-x" viewBox="0 0 16 16">
                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </td>
                                <td>Pangkalan Data</td>
                                <td>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="green" class="bi bi-check" viewBox="0 0 16 16">
                                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                    </svg>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="red" class="bi bi-x" viewBox="0 0 16 16">
                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </td>
                                <td>Pengesahan Kes Baharu</td>
                                <td>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="green" class="bi bi-check" viewBox="0 0 16 16">
                                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                    </svg>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="red" class="bi bi-x" viewBox="0 0 16 16">
                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </td>
                                <td>Pembahagian Kes Secara Automatik</td>
                                <td>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="green" class="bi bi-check" viewBox="0 0 16 16">
                                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                    </svg>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tidak Mesra Pengguna
                                </td>
                                <td>Muka Layar Pengguna</td>
                                <td>
                                    Mesra Pengguna
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row no-gutters section-4 pt-5" id="section4">
            <div class="col-md-1 offset-md-1">
                <div id="img-background" class="ml-5">
                    <img src="/images/profile.png" alt="">
                </div>
            </div>
            <div class="col-md-4 offset-md-1 text-left">
                <p class="title">MUHAMMAD HAZIQ BIN ZAHARI</p>
                <p>A163388 <br>
                   Pelajar Tahun 4 <br>
                   Software Engineering (Information System)
                </p>
            </div>
            <div class="col-md-3 offset-md-1 border-left" id="footer-left">
                <span class="align-bottom">
                    <a href="#">.... Back to top
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-short" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5z"/>
                        </svg>
                    </a>
                </span>
            </div>

        </div>
    </div>
@endsection

