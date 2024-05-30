<?php include 'header.php';

$post = $db->prepare('SELECT * FROM ipuclari');
$post->execute();
$count4 = $post->rowCount();

$post = $db->prepare('SELECT * FROM post');
$post->execute();
$count3 = $post->rowCount();

$post = $db->prepare('SELECT * FROM yorumlar');
$post->execute();
$count2 = $post->rowCount();


$post = $db->prepare('SELECT * FROM iletisim');
$post->execute();
$count1 = $post->rowCount();





?>



              <div class="container-fluid">
                <div class="row">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Toplam mesaj sayısı</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count1;?></div>
                                    </div>
                                    <div class="col-auto">
                                      <i class="fas fa-envelope fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Toplam Yorum sayısı</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count2; ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-comment fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                          Toplam blog sayısı</div>
                                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count3; ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pending Requests Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Bilgiler & Taktikler</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count4;?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-info-circle fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                </div>
            </div>
          <?php include 'footer.php'; ?>
