<!DOCTYPE html>
<html lang="en">

<head>
    <?= view('shared.headerhead'); ?>
</head>
<style>
    @media screen and (max-width: 600px) {
        table {
            display: block;
            overflow-x: auto;
        }
    }
</style>

<body>
    <?= view('shared.headerbody'); ?>
    <?= view('shared.sidebar', ['sidebar_selected' => 'template']); ?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Formulir</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/form/template">Formulir</a></li>
                    <li class="breadcrumb-item active">Data</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        @if (session('action_message'))
            <div class="alert alert-secondary">
                <p>{{ session('action_message') }}</p>
                <p>{{ session('action_data') }}</p>
            </div>
        @endif

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Data Formulir</h5>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        @foreach ($label_list as $label)
                                            <th scope="col">{{$label}}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dump_list as $dump)
                                        <tr>
                                            @foreach ($dump['data_list'] as $data)
                                                <td>
                                                    {{ $data['value'] }}
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
</body>

<?= view('shared.footer')?>

</html>
