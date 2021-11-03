<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = Yii::t('app', 'Our stories');
$this->params['breadcrumbs'][] = $this->title;
$imgUrl = Yii::$app->params['common'] . "/media";
$this->registerCssFile(Url::toRoute("/css/stories.css"));
$this->registerCss(".intro-quote{
    background: url(" . $imgUrl . "/quote.png) no-repeat top left;
    position: relative;
    padding-left: 90px;
    text-align: justify;
   }")
?>
<div class="site-our-stories">
    <div class="full-width d-none d-md-block">
        <!-- Carousel wrapper -->
        <div id="sliderHeader" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <!-- Indicators -->
            <div class="carousel-indicators">
                <?php foreach ($slider as $key => $value): ?>
                    <button type="button" data-bs-target="#carouselBasicExample" data-bs-slide-to="<?= $key ?>"
                            class="active"
                            aria-current="true" aria-label="Slide <?= $key + 1 ?>"></button>
                <?php endforeach; ?>
            </div>
            <!-- Inner -->
            <div class="carousel-inner">
                <?php foreach ($slider as $key => $value): ?>
                    <!-- Single item -->
                    <div class="carousel-item <?= $key == 0 ? 'active' : '' ?>">
                        <img src="<?= $imgUrl .'/'. $value['link'] ?>" class="d-block w-100"
                             alt="<?= empty($value['slide_label']) ? 'De Obelly' : $value['slide_label'] ?>"/>
                        <div class="carousel-caption d-none d-md-block">
                            <h5><?= empty($value['slide_label']) ? '' : $value['slide_label'] ?></h5>
                            <p><?= empty($value['slide_text']) ? '' : $value['slide_text'] ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#sliderHeader"
                    data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#sliderHeader"
                    data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!-- Carousel wrapper -->
    </div>
    <div class="shop-intro text-center pt-md-5 pb-2">
        <img src="<?= $imgUrl ?>/stories/TUJ04917.jpg" width="100%">
        <h3 class="text-uppercase py-2">De Obelly Shop</h3>
        <div class="intro-text px-3">
            <p>Với việc tập trung vào giá trị cốt lõi về chất lượng sản phẩm, cũng như phát triển dịch vụ, kết hợp trải
                nghiệm khách hàng tại điểm bán lẻ nhằm cung cấp cho khách hàng sự tự tin, tính trang trọng và sự hứng
                khởi trong việc mua sắm, De Obelly đã phát triển đa dạng các dòng hàng, từ áo sơ mi, polo cho tới
                các bộ quần áo vest lịch lãm, hay các phụ kiện đồ da tinh tế.</p>
            <p>Tất cả các sản phẩm của De Obelly đều được sản xuất dưới tiêu chuẩn chất lượng sản phẩm của phân
                khúc xa xỉ và cận xa xỉ với triết lý sử dụng các nguyên phụ liệu cao cấp và xa xỉ nhập khẩu từ các nhà
                máy có uy tín lâu năm đang sản xuất cho các thương hiệu xa xỉ, và gia công tại hệ thống các nhà máy
                nhượng quyền sản xuất được tuyển chọn của De Obelly đặt tại Ý, Bồ Đào Nha, Nhật, Ấn Độ, Trung Quốc,
                Việt Nam, Thái Lan… Sản phẩm bắt buộc phải trải qua các vòng kiểm tra chi tiết, đảm bảo chất lượng đúng
                chuẩn hàng xa xỉ Châu Âu – tiêu chuẩn mà De Obelly đã tuân thủ trong thời gian qua.</p>
            <p>Không chỉ quan tâm đặc biệt tới các vấn đề về sản xuất, De Obelly còn quan tâm tới việc thiết kế và
                chỉ đạo nghệ thuật để có được sự liền mạch trong trải nghiệm khách hàng. Với đội ngũ tư vấn về sáng tạo và truyền thông có uy tín
                quốc tế, De Obelly hứa hẹn sẽ mang lại làn gió mới cho ngành thời trang cao cấp và cận xa xỉ ở Việt
                Nam cũng như khu vực Đông Nam Á.</p>
        </div>
    </div>
    <div class="full-width pb-4 pb-md-5 d-none d-md-block">
        <img src="<?= $imgUrl ?>/stories/brand2.jpg" width="100%">
    </div>
    <div class="container-md p-0">
        <div class="row quotes pb-4 pb-md-5 text-center w-100 mx-0 px-2">
            <div class="col-12 col-md-1"></div>
            <div class="col-12 col-md-5">
                <img src="<?= $imgUrl ?>/stories/handsome.jpg" width="100%">
            </div>
            <div class="col-12 col-md-5 intro-quote mt-3 mt-md-0 pt-md-0 pe-0">
                <p>“Từ khi ra đời đến nay, chúng tôi luôn kiên định với sứ mệnh tái hiện nét thanh lịch tự nhiên và
                    phong cách Ý tại khu vực Đông Nam Á. Đó là lý do chúng tôi tồn tại và làm việc mỗi ngày. Chúng tôi
                    đặc biệt quan tâm tới việc phục vụ khách hàng với những sản phẩm tinh tế, xa xỉ cùng chất lượng vượt
                    trội và phong cách thanh lịch tự nhiên. Sự tập trung vào việc đổi mới liên tục giúp chúng tôi phục
                    vụ khách
                    hàng ngày càng hiệu quả hơn.”</p>
            </div>
            <div class="col-12 col-md-1"></div>
        </div>
    </div>
</div>