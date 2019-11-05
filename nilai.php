<?php
    include 'onek.php';
    require_once 'nav.php';
?>
            
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Data Nilai Siswa</h1>
                            <a href="kriteria.php">tentukan kriteria dahulu</a>
                        </div>

                        <div class="col-lg-8">
                            <form role="form" method="POST" action="">
                                <div class="form-group">
                                    <input required type="text" name="nisn" class="form-control" placeholder="NISN">
                                </div>
                                <div class="form-group">
                                    <input required type="text" name="nilaipel" class="form-control" placeholder="NILAI PELAJARAN">
                                </div>
                                <div class="form-group">
                                    <input required type="text" name="nilaikep" class="form-control" placeholder="NILAI KEPRIBADIAN">
                                </div>
                                <div class="form-group">
                                    <input required type="text" name="nilaiak" class="form-control" placeholder="NILAI AKADEMIK">
                                </div>  
                                <div class="form-group">
                                    <input type="submit" name="submit" class=" btn btn-primary form-control" value="submit" placeholder="submit">
                                </div>
                            </form>

                            <?php
                                if (isset($_POST['submit'])) {
                                    $nisn    = $_POST['nisn'];
                                    $nilaipel= $_POST['nilaipel'];
                                    $nilaikep= $_POST['nilaikep'];
                                    $nilaiak = $_POST['nilaiak'];
                                    // var_dump($nama,$nisn,$kelamin,$kelas,$sekolah);
                                    // die;
                                    $sqlceknilai = "SELECT * FROM penilaian WHERE nisn=$nisn";
                                    $sqlcek  = "SELECT * FROM siswa WHERE nisn=$nisn ";
                                    $cekquery= mysqli_query($dbcon,$sqlcek);
                                    
                                    if (mysqli_num_rows($cekquery) < 1) {
                                        echo "<script>alert('data siswa tidak ditemukan')</script>";
                                    }else{
                                        if (mysqli_num_rows(mysqli_query($dbcon,$sqlceknilai)) < 1 ) {
                                             $sql = "INSERT INTO penilaian (nisn,np,nk,na)VALUES ('$nisn','$nilaipel','$nilaikep','$nilaiak')";
                                            $query = mysqli_query($dbcon,$sql);
                                            if ($query) {
                                                echo "<script>alert('berhasil memasukkan data penilaian')</script>";
                                            }else{
                                                echo "<script>alert('Gagal Memasukkan data')</script>";
                                            }
                                        }else{
                                                echo "<script>alert('Duplikasi Data dengan NIM tersebut')</script>";

                                        }
                                    }                                        
                                }
                            ?>
                        </div>


                         <!-- Menampilkan Tabel Data -->
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Data Alternatif
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>NISN</th>
                                                    <th>Nama Siswa</th>
                                                    <th>Nilai Pelajaran</th>
                                                    <th>Nilai Kepribadian</th>
                                                    <th>Nilai Akademik</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- mengeluarkan data siswa dari database -->
                                                <?php
                                                   $sql ="SELECT * FROM penilaian";
                                                   $query = mysqli_query($dbcon, $sql);
                                                   $n = 1 ;



                                                   while ($siswa=mysqli_fetch_array($query)) {
                                                        $nisn = $siswa['nisn'];
                                                        $sqlnama = "SELECT nama FROM siswa WHERE nisn = $nisn";
                                                        $namasiswa = mysqli_fetch_array(mysqli_query($dbcon,$sqlnama));
                                                        
                                                ?>
                                                        <tr>
                                                            <td><?=$n?></td>
                                                            <td><?=$siswa['nisn']?></td>
                                                            <td><?=$namasiswa['nama']?></td>
                                                            <td class="text-right"><?=$siswa['np']?></td>
                                                            <td class="text-right"><?=$siswa['nk']?></td>
                                                            <td class="text-right"><?=$siswa['na']?></td>
                                                            <td><a href="aksi/hapusna.php?name=<?=$siswa['id_penilaian'];?>">hapus</a> | <a href="">edit</a></td>
                                                        </tr>
                                                <?php
                                                    $n++;
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end Tabel Data -->


                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

<?php 
    require_once 'foot.php';
 ?>