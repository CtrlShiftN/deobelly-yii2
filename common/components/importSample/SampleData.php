<?php

namespace common\components\importsample;

use common\components\SystemConstant;
use common\models\Post;
use common\models\PostCategory;
use common\models\PostTag;
use common\models\Meta;
use common\models\Products;
use common\models\ProductsCategory;
use common\models\TermsAndServices;
use common\models\Trademark;
use common\models\User;

class SampleData
{
    /**
     * user data
     * @var array[]
     */
    protected static $userInfoArr = [
        [
            'email' => 'admin.deobelly@gmail.com',
            'password_hash' => 'Iamadmin@1234',
            'name' => "I'm Admin",
            'tel' => '0364752421',
            'username' => 'admin',
            'role' => User::ROLE_ADMIN,
        ],
        [
            'email' => 'editor.deobelly@gmail.com',
            'password_hash' => 'Iameditor@1234',
            'name' => "I'm Writer God",
            'tel' => '0334517566',
            'username' => 'editor',
            'role' => User::ROLE_EDITOR,
        ],
        [
            'email' => 'sale.deobelly@gmail.com',
            'password_hash' => 'Iamsale@1234',
            'name' => "I'm Sale",
            'tel' => '0345678910',
            'username' => 'sale',
            'role' => User::ROLE_SALE,
        ],
        [
            'email' => 'customer.deobelly@gmail.com',
            'password_hash' => 'Iamcustomer@1234',
            'name' => "I'm Customer",
            'tel' => '0333333333',
            'username' => 'customer',
            'role' => User::ROLE_USER,
        ]
    ];

    /**
     *
     * @throws \yii\base\Exception
     */
    public static function insertSampleUser()
    {
        $countUsers = 0;
        foreach (self::$userInfoArr as $values) {
            $user = new User();
            $user->email = $values['email'];
            $user->setPassword($values['password_hash']);
            $user->name = $values['name'];
            $user->tel = $values['tel'];
            $user->generateAuthKey();
            $user->generatePasswordResetToken();
            $user->username = $values['username'];
            $user->referral_code = strstr($values['email'], '@', true);
            $user->role = $values['role'];
            $user->created_at = date('Y-m-d H:m:s');
            $user->updated_at = date('Y-m-d H:m:s');
            if ($user->save()) {
                $countUsers++;
            }
        }
        echo "Inserted " . $countUsers . '/' . count(self::$userInfoArr) . ' users.' . PHP_EOL;
    }

    /**
     * product data
     * @var array[]
     */
    protected static $productInforArr = [
        [
            'name' => 'Áo thun không cổ BOSS',
            'slug' => 'ao-thun-khong-co-boss-1',
            'short_description' => "<li>Category：Men's Wear   Clothing  Women’s Wear</li>",
            'description' => "<li>Category：Men's Wear   Clothing  Women’s Wear</li>
<li>T-Shirts</li>
<li>-Color：Black , White , Red, Blue, Yellow,Pink</li>
<li>-Sizes: XS  S M L XL  XXL  3XL </li>
<li>-If you like loose, please take a big size.</li>
<li>-Ships From:China</li>
<li>-Transportation time：It takes about 5-20 days, depending on the speed of logistics</li>
<li>-Product Description</li>
<li>-Brand New T-shirt </li>
<li>-Various tide brands</li>
<li>-We are committed to providing you with the best quality products at the best prices.</li>
",
            'cost_price' => 150000,
            'regular_price' => 299000,
            'sale_price' => null,
            'SKU' => SystemConstant::PRODUCT_CATEGORY_TYPE_TOP . '1',
            'quantity' => 20,
            'image' => 'product/clothes/top/shirt1.png',
            'images' => 'product/clothes/top/shirt1.png,product/clothes/shirt/shirt2.png,product/clothes/top/shirt3.png',
            'category_id' => SystemConstant::PRODUCT_CATEGORY_TYPE_TOP . '2',
            'trademark_id' => 1,
            'admin_id' => 1,
        ],
        [
            'name' => 'Áo thun không cổ HUGO-BOSS',
            'slug' => 'ao-thun-khong-co-hugo-boss',
            'short_description' => "<li>Category：Men's Wear   Clothing  Women’s Wear</li>",
            'description' => "<li>Category：Men's Wear   Clothing  Women’s Wear</li>
<li>T-Shirts</li>
<li>-Color：Black , White , Red, Blue, Yellow,Pink</li>
<li>-Sizes: XS  S M L XL  XXL  3XL </li>
<li>-If you like loose, please take a big size.</li>
<li>-Ships From:China</li>
<li>-Transportation time：It takes about 5-20 days, depending on the speed of logistics</li>
<li>-Product Description</li>
<li>-Brand New T-shirt </li>
<li>-Various tide brands</li>
<li>-We are committed to providing you with the best quality products at the best prices.</li>
",
            'cost_price' => 200000,
            'regular_price' => 400000,
            'sale_price' => null,
            'SKU' => SystemConstant::PRODUCT_CATEGORY_TYPE_TOP . '1',
            'quantity' => 20,
            'image' => 'product/clothes/top/shirt6.png',
            'images' => 'product/clothes/top/shirt1.png,product/clothes/shirt/shirt2.png,product/clothes/top/shirt3.png',
            'category_id' => SystemConstant::PRODUCT_CATEGORY_TYPE_TOP . '2',
            'trademark_id' => 1,
            'admin_id' => 1,
        ],
        [
            'name' => 'Áo thun không cổ',
            'slug' => 'ao-thun-khong-co',
            'short_description' => "<li>Category：Men's Wear   Clothing  Women’s Wear</li>",
            'description' => "<li>Category：Men's Wear   Clothing  Women’s Wear</li>
<li>T-Shirts</li>
<li>-Color：Black , White , Red, Blue, Yellow,Pink</li>
<li>-Sizes: XS  S M L XL  XXL  3XL </li>
<li>-If you like loose, please take a big size.</li>
<li>-Ships From:China</li>
<li>-Transportation time：It takes about 5-20 days, depending on the speed of logistics</li>
<li>-Product Description</li>
<li>-Brand New T-shirt </li>
<li>-Various tide brands</li>
<li>-We are committed to providing you with the best quality products at the best prices.</li>
",
            'cost_price' => 200000,
            'regular_price' => 399000,
            'sale_price' => null,
            'SKU' => SystemConstant::PRODUCT_CATEGORY_TYPE_TOP . '1',
            'quantity' => 20,
            'image' => 'product/clothes/top/shirt3.png',
            'images' => 'product/clothes/top/shirt1.png,product/clothes/shirt/shirt2.png,product/clothes/top/shirt3.png',
            'category_id' => SystemConstant::PRODUCT_CATEGORY_TYPE_TOP . '2',
            'trademark_id' => 1,
            'admin_id' => 1,
        ],
        [
            'name' => 'Áo thun không cổ',
            'slug' => 'ao-thun-khong-co-2',
            'short_description' => "<li>Category：Men's Wear   Clothing  Women’s Wear</li>",
            'description' => "<li>Category：Men's Wear   Clothing  Women’s Wear</li>
<li>T-Shirts</li>
<li>-Color：Black , White , Red, Blue, Yellow,Pink</li>
<li>-Sizes: XS  S M L XL  XXL  3XL </li>
<li>-If you like loose, please take a big size.</li>
<li>-Ships From:China</li>
<li>-Transportation time：It takes about 5-20 days, depending on the speed of logistics</li>
<li>-Product Description</li>
<li>-Brand New T-shirt </li>
<li>-Various tide brands</li>
<li>-We are committed to providing you with the best quality products at the best prices.</li>
",
            'cost_price' => 200000,
            'regular_price' => 399000,
            'sale_price' => null,
            'SKU' => SystemConstant::PRODUCT_CATEGORY_TYPE_TOP . '1',
            'quantity' => 20,
            'image' => 'product/clothes/top/shirt5.png',
            'images' => 'product/clothes/top/shirt1.png,product/clothes/shirt/shirt2.png,product/clothes/top/shirt3.png',
            'category_id' => SystemConstant::PRODUCT_CATEGORY_TYPE_TOP . '2',
            'trademark_id' => 1,
            'admin_id' => 1,
        ],
        [
            'name' => 'Áo thun không cổ',
            'slug' => 'ao-thun-khong-co-3',
            'short_description' => "<li>Category：Men's Wear   Clothing  Women’s Wear</li>",
            'description' => "<li>Category：Men's Wear   Clothing  Women’s Wear</li>
<li>T-Shirts</li>
<li>-Color：Black , White , Red, Blue, Yellow,Pink</li>
<li>-Sizes: XS  S M L XL  XXL  3XL </li>
<li>-If you like loose, please take a big size.</li>
<li>-Ships From:China</li>
<li>-Transportation time：It takes about 5-20 days, depending on the speed of logistics</li>
<li>-Product Description</li>
<li>-Brand New T-shirt </li>
<li>-Various tide brands</li>
<li>-We are committed to providing you with the best quality products at the best prices.</li>
",
            'cost_price' => 300000,
            'regular_price' => 599000,
            'sale_price' => null,
            'SKU' => SystemConstant::PRODUCT_CATEGORY_TYPE_TOP . '1',
            'quantity' => 20,
            'image' => 'product/clothes/top/shirt4.png',
            'images' => 'product/clothes/top/shirt1.png,product/clothes/shirt/shirt2.png,product/clothes/top/shirt3.png',
            'category_id' => SystemConstant::PRODUCT_CATEGORY_TYPE_TOP . '2',
            'trademark_id' => 1,
            'admin_id' => 1,
        ],
        [
            'name' => 'Áo thun không cổ',
            'slug' => 'ao-thun-khong-co-4',
            'short_description' => "<li>Category：Men's Wear   Clothing  Women’s Wear</li>",
            'description' => "<li>Category：Men's Wear   Clothing  Women’s Wear</li>
<li>T-Shirts</li>
<li>-Color：Black , White , Red, Blue, Yellow,Pink</li>
<li>-Sizes: XS  S M L XL  XXL  3XL </li>
<li>-If you like loose, please take a big size.</li>
<li>-Ships From:China</li>
<li>-Transportation time：It takes about 5-20 days, depending on the speed of logistics</li>
<li>-Product Description</li>
<li>-Brand New T-shirt </li>
<li>-Various tide brands</li>
<li>-We are committed to providing you with the best quality products at the best prices.</li>
",
            'cost_price' => 175000,
            'regular_price' => 349000,
            'sale_price' => null,
            'SKU' => SystemConstant::PRODUCT_CATEGORY_TYPE_TOP . '1',
            'quantity' => 20,
            'image' => 'product/clothes/top/shirt2.png',
            'images' => 'product/clothes/top/shirt1.png,product/clothes/shirt/shirt2.png,product/clothes/top/shirt3.png',
            'category_id' => SystemConstant::PRODUCT_CATEGORY_TYPE_TOP . '2',
            'trademark_id' => 1,
            'admin_id' => 1,
        ],
        [
            'name' => 'Áo sơ mi nam tay dài CÔNG SỞ LADOS',
            'slug' => 'ao-so-mi-nam-tay-dai-cong-so-lados',
            'short_description' => "<li>chất vải mát mịn chống nhăn</li>",
            'description' => "
<li> Chất liệu: vải kate lụa mịn mềm, thấm hút mồ hôi tốt.</li>
<li> Co giãn nhẹ, mặc cực thoải mái, ít nhăn</li>
<li> Chất vải đẹp, không xù lông, không phai màu</li>
<li> Đường may cực tỉ mỉ cực đẹp</li>
<li> Có thể mặc đi làm, đi chơi, dễ phối đồ, không kén người mặc</li>
<li> Kiểu dáng: Thiết kế theo form rộng vừa,đơn giản , dễ mặc ..Tôn lên được sự trẻ trung năng động cho các bạn nam, kèm vào đó là sự hoạt động thoải mái khi mặc sản phẩm.</li>
</li>Được sản xuất và bảo hành bởi Công ty TNHH MTV LADOS VIỆT NAM</li>
",
            'cost_price' => 800000,
            'regular_price' => 1600000,
            'sale_price' => 1360000,
            'SKU' => SystemConstant::PRODUCT_CATEGORY_TYPE_TOP . '2',
            'quantity' => 30,
            'image' => 'product/clothes/shirt/ao-so-mi-lados.jpg',
            'images' => '',
            'category_id' => SystemConstant::PRODUCT_CATEGORY_TYPE_TOP . '1',
            'trademark_id' => 2,
            'admin_id' => 1,
        ],
        [
            'name' => 'Áo Vest Nam Thời Trang The Shirts Studio Hàn Quốc',
            'slug' => 'ao-vest-nam-thoi-trang-the-shirt-studio-han-quoc',
            'short_description' => "",
            'description' => "
<li> Hàng nhập khẩu trực tiếp chính hãng từ Hàn Quốc.</li>
<li> Thiết kế đẹp mắt hợp thời trang, kiểu dáng trẻ trung. </li>
<li> Bộ Vest The Shirt Studio là dòng sản phẩm cao cấp,được thiết kế,may đo theo xu hướng hiện đại ,lịch lãm ,kiểu dáng body khoẻ khoắn.</li>
<li> <ul>Hướng dẫn bảo quản:<li> Giặt máy bằng nước lạnh</li><li> Không sử dụng chất tẩy mạnh.</li><li> Ủi nhẹ ở nhiệt độ tối đa 110°C.</li></ul></li>
</li> Thông tin thương hiệu The Shirt Studio là thương hiệu thời trang rất được giới trẻ ưa chuộng. Khác với những thương hiệu thời trang thông thường, The Shirt Studio không chú trọng vào những thiết kế mang tính thời thượng mà chỉ tập trung phát triển những mẫu trang phục cơ bản nhất, dễ phối đồ và luôn cần có trong tủ quần áo của các đấng mày râu. Thêm vào đó, sự khác biệt của The Shirt Studio còn thể hiện rõ nét thông qua chất liệu vải được tuyển chọn, xử lý kỹ lưỡng , thân thiện với môi trường, kết hợp cùng kiểu dáng không bao giờ lỗi mốt và những đường cắt may tinh xảo</li>
",
            'cost_price' => 600000,
            'regular_price' => 11999000,
            'sale_price' => 10190000,
            'SKU' => SystemConstant::PRODUCT_CATEGORY_TYPE_TOP . '3',
            'quantity' => 18,
            'image' => 'product/clothes/vest/vest-nam-han-quoc.jpg',
            'images' => '',
            'category_id' => SystemConstant::PRODUCT_CATEGORY_TYPE_TOP . '3',
            'trademark_id' => 3,
            'admin_id' => 1,
        ],
    ];

    /**
     *
     */
    public static function insertSampleProduct()
    {
        $countProduct = 0;
        foreach (self::$productInforArr as $values) {
            $product = new Products();
            $product->name = $values['name'];
            $product->slug = $values['slug'];
            $product->short_description = $values['short_description'];
            $product->description = $values['description'];
            $product->cost_price = $values['cost_price'];
            $product->regular_price = $values['regular_price'];
            if(!empty($values['sale_price']))
            {
                $product->sale_price = $values['sale_price'];
            } else {
                $product->sale_price = null;
            }
            $product->SKU = $values['SKU'];
            $product->quantity = $values['quantity'];
            $product->image = $values['image'];
            $product->images = $values['images'];
            $product->category_id = $values['category_id'];
            $product->trademark_id = $values['trademark_id'];
            $product->created_at = date('Y-m-d H:m:s');
            $product->updated_at = date('Y-m-d H:m:s');
            $product->admin_id = $values['admin_id'];
            if ($product->save()) {
                $countProduct++;
            }
        }
        echo "Inserted " . $countProduct . '/' . count(self::$productInforArr) . ' products.' . PHP_EOL;
    }

    /**
     *  product category data
     * @var array[]
     */
    protected static $productCategoryInfoArr = [
        [
            'name' => 'Áo sơ mi',
            'slug' => 'ao-so-mi',
            'code' => SystemConstant::PRODUCT_CATEGORY_TYPE_TOP . '1',
            'admin_id' => 1,
        ],
        [
            'name' => 'Áo thun',
            'slug' => 'ao-thun',
            'code' => SystemConstant::PRODUCT_CATEGORY_TYPE_TOP . '2',
            'admin_id' => 1,
        ],
        [
            'name' => 'Áo Vest',
            'slug' => 'ao-vest',
            'code' => SystemConstant::PRODUCT_CATEGORY_TYPE_TOP . '3',
            'admin_id' => 1,
        ],
        [
            'name' => 'Quần âu',
            'slug' => 'quan-au',
            'code' => SystemConstant::PRODUCT_CATEGORY_TYPE_TROUSERS . '1',
            'admin_id' => 1,
        ],
        [
            'name' => 'Dây lưng',
            'slug' => 'day-lung',
            'code' => SystemConstant::PRODUCT_CATEGORY_TYPE_ACCESSORIES . '1',
            'admin_id' => 1,
        ],
        [
            'name' => 'Giày thể thao',
            'slug' => 'giay-the-thao',
            'code' => SystemConstant::PRODUCT_CATEGORY_TYPE_SHOES . '1',
            'admin_id' => 1,
        ],
    ];

    /**
     *
     */
    public static function insertSampleProductCategory()
    {
        $countCategory = 0;
        foreach (self::$productCategoryInfoArr as $values) {
            $category = new ProductsCategory();
            $category->name = $values['name'];
            $category->slug = $values['slug'];
            $category->code = $values['code'];
            $category->created_at = date('Y-m-d H:m:s');
            $category->updated_at = date('Y-m-d H:m:s');
            $category->admin_id = $values['admin_id'];
            if ($category->save()) {
                $countCategory++;
            }
        }
        echo "Inserted " . $countCategory . '/' . count(self::$productCategoryInfoArr) . ' products category.' . PHP_EOL;
    }

    /**
     *  trademark data
     * @var array[]
     */
    protected static $trademarkInfoArr = [
        [
            'id' => 1,
            'name' => 'HUGO',
            'slug' => 'hugo',
            'admin_id' => 1,
        ],
        [
            'id' => 2,
            'name' => 'LADOS',
            'slug' => 'lados',
            'admin_id' => 1,
        ],
        [
            'id' => 3,
            'name' => 'The Shirt Studio',
            'slug' => 'the-shirt-studio',
            'admin_id' => 1,
        ],
    ];

    /**
     *
     */
    public static function insertSampleTrademark()
    {
        $countTrademark = 0;
        foreach (self::$trademarkInfoArr as $values) {
            $trademark = new Trademark();
            $trademark->id = $values['id'];
            $trademark->name = $values['name'];
            $trademark->slug = $values['slug'];
            $trademark->created_at = date('Y-m-d H:m:s');
            $trademark->updated_at = date('Y-m-d H:m:s');
            $trademark->admin_id = $values['admin_id'];
            if ($trademark->save()) {
                $countTrademark++;
            }
        }
        echo "Inserted " . $countTrademark . '/' . count(self::$trademarkInfoArr) . ' trademarks.' . PHP_EOL;
    }

    /**
     *  post data
     * @var array[]
     */
    protected static $postInfoArr = [
        [
            'avatar' => 'post/avatar/lacoste-ava.PNG',
            'title' => 'De Obelly Collections 2021 - Lựa chọn hoàn hảo cho mùa hè',
            'slug' => 'de-obelly-collections-2021-lua-chon-hoan-hao-cho-mua-he',
            'content' => '<p>FashionTEA - Polo - Trang phục kinh điển của cánh mày râu. Tận hưởng mùa hè mát lạnh
                                với những chiếc áo Polo đa sắc màu trong BST Hè DE OBELLY 2021. Hãy check ngay những mẫu
                                 Hot nhất trong tuần qua nhé</p><p>Áo polo được bắt nguồn từ bang Manipur của Ấn Độ
                                 - nơi khởi nguồn của môn polo (bóng khúc cầu trên lưng ngựa). Những người lính thực dân
                                 Anh đã mang trò chơi này về quê hương và biến nó thành môn thể thao quý tộc ở Anh vào cuối
                                  thế kỷ 19. Thiết kế nguyên bản của áo Polo là dáng dài tay thay vì ngắn tay như ngày nay.</p>
                                  <p>Khi Lacoste lần đầu mặc trang phục này đến giải quần vợt US Open 1926 và giành chức vô địch,
                                  nó lập tức trở thành một hiện tượng thời trang. Đây là một trang phục đơn giản dành cho mọi nam giới,
                                   đã có lịch sử tông tại gần 100 năm, không có sự phân biệt giàu nghèo, cao thấp trong văn hóa mặc của đàn ông.
                                   Cùng với nhiều ưu điểm vượt trội từ áo phông có cổ mang đến cho người mặc.</p>
                                   <p>Áo có form ôm người nhưng vẫn tôn lên các đường nét vạm vỡ, săn chắc của phái mạnh</p>
                                    <p>Thiết kế hội tụ đầy đủ tính ưu việt, vượt trội hơn hẳn "người anh em" sơ mi</p>
                                    <p>Phong cách thể thao, nam tính và năng động, trẻ trung là điều mà bất kỳ người đàn ông nào cũng muốn hướng đến</p>
                                    <p>Chất liệu co giãn tốt, thoáng mát, thấm hút mồ hôi cho người mặc vận động thoải mái</p>
                                    <p>Gam màu đa dạng, dễ dàng mix cùng nhiều trang phục mà vẫn giữ được lịch lãm, cổ điển không bao giờ lỗi mốt</p>
                                    <p>Nếu bạn một tín đồ của áo polo, hãy lựa ngay items mình yêu thích và đặt hàng ngay tại Biluxury!</p>',
            'admin_id' => 2,
            'tag_id' => '1,2,5',
            'post_category_id' => 7,
        ],
        [
            'avatar' => 'post/avatar/lacoste-ava.PNG',
            'title' => 'Cực chất với bộ sưu tập mùa hè',
            'slug' => 'cuc-chat-voi-bo-suu-tap-mua-he',
            'content' => '<p>FashionTEA - Polo - Trang phục kinh điển của cánh mày râu. Tận hưởng mùa hè mát lạnh
                                với những chiếc áo Polo đa sắc màu trong BST Hè DE OBELLY 2021. Hãy check ngay những mẫu
                                 Hot nhất trong tuần qua nhé</p><p>Áo polo được bắt nguồn từ bang Manipur của Ấn Độ
                                 - nơi khởi nguồn của môn polo (bóng khúc cầu trên lưng ngựa). Những người lính thực dân
                                 Anh đã mang trò chơi này về quê hương và biến nó thành môn thể thao quý tộc ở Anh vào cuối
                                  thế kỷ 19. Thiết kế nguyên bản của áo Polo là dáng dài tay thay vì ngắn tay như ngày nay.</p>
                                  <p>Khi Lacoste lần đầu mặc trang phục này đến giải quần vợt US Open 1926 và giành chức vô địch,
                                  nó lập tức trở thành một hiện tượng thời trang. Đây là một trang phục đơn giản dành cho mọi nam giới,
                                   đã có lịch sử tông tại gần 100 năm, không có sự phân biệt giàu nghèo, cao thấp trong văn hóa mặc của đàn ông.
                                   Cùng với nhiều ưu điểm vượt trội từ áo phông có cổ mang đến cho người mặc.</p>
                                   <p>Áo có form ôm người nhưng vẫn tôn lên các đường nét vạm vỡ, săn chắc của phái mạnh</p>
                                    <p>Thiết kế hội tụ đầy đủ tính ưu việt, vượt trội hơn hẳn "người anh em" sơ mi</p>
                                    <p>Phong cách thể thao, nam tính và năng động, trẻ trung là điều mà bất kỳ người đàn ông nào cũng muốn hướng đến</p>
                                    <p>Chất liệu co giãn tốt, thoáng mát, thấm hút mồ hôi cho người mặc vận động thoải mái</p>
                                    <p>Gam màu đa dạng, dễ dàng mix cùng nhiều trang phục mà vẫn giữ được lịch lãm, cổ điển không bao giờ lỗi mốt</p>
                                    <p>Nếu bạn một tín đồ của áo polo, hãy lựa ngay items mình yêu thích và đặt hàng ngay tại Biluxury!</p>',
            'admin_id' => 2,
            'tag_id' => '2,6,8',
            'post_category_id' => 7,
        ],
        [
            'avatar' => 'post/avatar/lacoste-ava.PNG',
            'title' => 'Community And Style Thrived at the Santa Fe Indian Market',
            'slug' => 'community—and-style—thrived-at-the-santa-fe-indian-market',
            'content' => '<p>Every year, the Santa Fe Indian Market brings in thousands of global tourists and collectors to the city. 
                         Visitors flock to the streets around the city’s main plaza, 
                         where hundreds of Indigenous artists from different tribes across North America showcase and sell their new works 
                         (including textiles, jewelry, art, and more) in their respective booths. 
                         This weekend, the 99th annual outdoor market returned once again, and the sense of community was as present as ever. 
                         While overall attendance was down (the typically free event was ticketed this year due to COVID) and the number of artists showcasing was fewer than usual, 
                         you could still feel the energy and excitement around the event. 
                         The streets were still lined with excited shoppers perusing the latest goods, 
                         and booths were filled with artists visiting each other and having a laugh—masks up, of course.</p>
                        <p>Indian Market weekend is a big tourism event for the city, but the occasion represents something much more important for the participating artists and artisans. Business aside, it’s a time for the Native American community to come back together, visit with friends and family, and get inspired by each other’s creativity. And this year, after a canceled 2020 event and a long time apart due to COVID-19, that spirit of connection was needed more than ever. “There is nothing like interacting with fellow creatives in person,” says Jamie Okuma, a Luiseño and Shoshone-Bannock fashion artist who showcased her new collection at the market’s fashion show this weekend. “Meeting collectors and enjoying being in the presence of other humans outside of family was something I really didn’t realize I needed. As an artist, I’m naturally isolated by profession, so the few shows I do in person are extremely important for my mental health. When those were gone, it was pretty rough.”</p>
                        <p>Last year, the Santa Fe Indian Market was held virtually, and for many artists, that meant a considerable loss of income. Sales at the fair make up a significant portion of their yearly incomes, as a single piece can go for thousands of dollars. For all these reasons, the Indigenous artists were counting on the continuation of this year’s event. “There was a lot of trepidation leading up to it, with the delta variant looming overhead and the state of New Mexico’s mandates ever changing,” says Pat Pruitt, a Laguna, Chiricahua Apache, and Anglo metalsmith and jewelry designer. “But it was good to see friends, family, and collectors.”</p>
                        <p>Though there were fewer visitors, many artists still did surprisingly well in sales; it seems shoppers were ready to spend. For instance, Naiomi Glasses—a Diné textile artist and first-time shower at the market—says she got many future rug orders from the event and looks forward to returning next year for its centennial year. “As a working artist, the market is important so that I could meet new and current customers in person. It gives them and me a personable connection,” says Glasses. </p>
                        <p>Along with a clear sense of togetherness, there was also major style present throughout the weekend—whether it was worn by visitors or artists on the streets or shown on the runway for the market’s annual fashion show, which was organized by Amber-Dawn Bear Robe. </p>
                        <p>Around the booths, visitors and artists alike dressed up for the affair, cladding themselves in their best ribbon skirts or turquoise squash-blossom necklaces. At the fashion show, Indigenous designers Jamie Okuma, Orlando Dugi, Pamela Baker, and Lauren Good Day showcased their newest collections, pieces that combined traditional craftsmanship with new, modern updates. Dugi and Baker showed refined eveningwear pieces like beaded gowns and velvet suiting, while Okuma opted for her signature statement prints on dresses, coats, and more. Good Day even showed sprightly athleticwear—the through line being that Native design doesn’t have to look one specific way. For all in attendance, that sense of innovation is forever an Indian Market staple. “The energy was palpable,” says Pruitt. “Spirits were high, and in the end, the machine that is Indian Market just keeps on going.”</p>
                        <p>Below, more stylish highlights from the Santa Fe Indian Market weekend.</p>',
            'admin_id' => 2,
            'tag_id' => '1,4,5',
            'post_category_id' => 4,
        ],
        [
            'avatar' => 'post/avatar/lacoste-ava.PNG',
            'title' => '4 "cặp đôi" trang phục cho chàng phong cách ngày hè',
            'slug' => '4-cap-doi-trang-phuc-cho-chang-phong-cach-mua-he',
            'content' => '<p>FashionTEA - Polo - Trang phục kinh điển của cánh mày râu. Tận hưởng mùa hè mát lạnh
                                với những chiếc áo Polo đa sắc màu trong BST Hè DE OBELLY 2021. Hãy check ngay những mẫu
                                 Hot nhất trong tuần qua nhé</p><p>Áo polo được bắt nguồn từ bang Manipur của Ấn Độ
                                 - nơi khởi nguồn của môn polo (bóng khúc cầu trên lưng ngựa). Những người lính thực dân
                                 Anh đã mang trò chơi này về quê hương và biến nó thành môn thể thao quý tộc ở Anh vào cuối
                                  thế kỷ 19. Thiết kế nguyên bản của áo Polo là dáng dài tay thay vì ngắn tay như ngày nay.</p>
                                  <p>Khi Lacoste lần đầu mặc trang phục này đến giải quần vợt US Open 1926 và giành chức vô địch,
                                  nó lập tức trở thành một hiện tượng thời trang. Đây là một trang phục đơn giản dành cho mọi nam giới,
                                   đã có lịch sử tông tại gần 100 năm, không có sự phân biệt giàu nghèo, cao thấp trong văn hóa mặc của đàn ông.
                                   Cùng với nhiều ưu điểm vượt trội từ áo phông có cổ mang đến cho người mặc.</p>
                                   <p>Áo có form ôm người nhưng vẫn tôn lên các đường nét vạm vỡ, săn chắc của phái mạnh</p>
                                    <p>Thiết kế hội tụ đầy đủ tính ưu việt, vượt trội hơn hẳn "người anh em" sơ mi</p>
                                    <p>Phong cách thể thao, nam tính và năng động, trẻ trung là điều mà bất kỳ người đàn ông nào cũng muốn hướng đến</p>
                                    <p>Chất liệu co giãn tốt, thoáng mát, thấm hút mồ hôi cho người mặc vận động thoải mái</p>
                                    <p>Gam màu đa dạng, dễ dàng mix cùng nhiều trang phục mà vẫn giữ được lịch lãm, cổ điển không bao giờ lỗi mốt</p>
                                    <p>Nếu bạn một tín đồ của áo polo, hãy lựa ngay items mình yêu thích và đặt hàng ngay tại Biluxury!</p>',
            'admin_id' => 2,
            'tag_id' => '3,8,1',
            'post_category_id' => 3,
        ],
    ];

    /**
     *
     */
    public static function insertSamplePost()
    {
        $countPost = 0;
        foreach (self::$postInfoArr as $value) {
            $post = new Post();
            $post->avatar = $value['avatar'];
            $post->title = $value['title'];
            $post->slug = $value['slug'];
            $post->content = $value['content'];
            $post->admin_id = $value['admin_id'];
            $post->tag_id = $value['tag_id'];
            $post->post_category_id = $value['post_category_id'];
            $post->created_at = date('Y-m-d H:m:s');
            $post->updated_at = date('Y-m-d H:m:s');
            if ($post->save()) {
                $countPost++;
            }
        }
        echo "Inserted " . $countPost . "/" . count(self::$postInfoArr) . ' post.' . PHP_EOL;
    }

    /**
     * @var array|array[]
     */
    protected static $termsInfoArr = [
        [
            'title' => ' ĐIỀU KHOẢN CỬA HÀNG TRỰC TUYẾN',
            'content' => '<p>- Bằng việc đồng ý các Điều Khoản Dịch Vụ, bạn xác nhận rằng ít nhất bạn trong độ tuổi trưởng thành ở khu vực mà bạn đang sống và bạn đã cho chúng tôi sự đồng ý của bạn để cho phép bất kỳ người phụ thuộc của bạn sử dụng trang này.<br>- Bạn có thể không sử dụng sản phẩm của chúng tôi khi có bất kỳ sự trái luật hoặc có ý định lạm dụng hay không trong khi sử dụng Dịch Vụ, vi phạm bất kỳ luật lệ nào trong quyền hạn của bạn (bao gồm nhưng không giới hạn quy định pháp luật).<br>- Bạn không được truyền bất kỳ sâu hoặc virus hoặc bất kỳ mã nào có tính chất phá hoại.<br>- Một sự vi phạm hoặc làm trái bất kỳ Điều Khoản nào sẽ dẫn đến việc chấm dứt ngay Dịch Vụ.</p>',
            'admin_id' => 1,
        ],
        [
            'title' => ' ĐIỀU KIỆN CHUNG',
            'content' => '<p>- Chúng tôi có quyền từ chối dịch vụ đối với bất kỳ ai với bất kỳ lý do vào bất kỳ thời điểm nào.<br>- Bạn hiểu rằng thông tin của bạn (không bao gồm thông tin thẻ tín dụng), có thể được chuyển không mã hóa và bao gồm (a) việc truyền qua các mạng liên kết khác nhau; và (b) thay đổi để phù hợp và thích ứng với các yêu cầu kỹ thuật của kết nối mạng hoặc thiết bị.<br>- Thông tin thẻ tín dụng sẽ luôn chuyển nguyên bản thành mật mã trong khi chuyển qua mạng.<br>- Bạn đồng ý không tạo lại, sao chép, bán, bán lại hoặc khai thác bất kỳ phần nào của Dịch Vụ, sử dụng Dịch Vụ, hoặc truy cập Dịch Vụ hoặc bất kỳ liên hệ nào trên trang web mà dịch vụ được cung cấp không có sự cho phép rõ ràng bằng văn bản của chúng tôi.<br>- Các mục được sử dụng trong thỏa thuận này chỉ gồm cho sự thuận tiện và sẽ không giới hạn hoặc ảnh hưởng đến các Điều Khoản.</p>',
            'admin_id' => 1,
        ],
        [
            'title' => 'ĐỘ  CHÍNH XÁC, ĐẦY ĐỦ VÀ THÔNG TIN KỊP THỜI',
            'content' => '<p>- Bạn không chịu trách nhiệm nếu thông tin được được có sẵn trên trang web không chính xác, đầy đủ hoặc hiện thời. <br>- Tài liệu trên trang web được cung cấp với thông tin chung và không nên dựa vào hoặc sử dụng hoặc sử dụng làm cơ sở để đưa ra quyết định mà không tham khảo các nguồn thông tin chính, chính xác hơn, đầy đủ hơn hoặc kịp thời hơn.<br>- Bất kỳ sự phụ thuộc nào vào tài liệu trên trang web này đều có rủi ro cho bạn.<br>- Trang web này có thể bao gồm những thông tin lịch sử nhất định. Thông tin lịch sử, tất yếu, không ở hiện tại và chỉ được cung cấp cho bạn tham khảo.<br>- Chúng tôi có quyền sửa đổi nội dung của trang web này bất cứ lúc nào, nhưng chúng tôi không có nghĩa vụ phải cập nhật bất kỳ thông tin nào trên trang web của chúng tôi.<br>- Bạn đồng ý rằng bạn có trách nhiệm theo dõi các thay đổi đối với trang web của chúng tôi.</p>',
            'admin_id' => 1,
        ],
        [
            'title' => 'SỬA ĐỔI DỊCH VỤ VÀ GIÁ CẢ',
            'content' => '<p>- Giá các sản phẩm của chúng tôi có thể thay đổi mà không cần thông báo trước. <br>- Chúng tôi có quyền bảo lưu bất cứ lúc nào để sửa đổi hoặc ngừng Dịch Vụ (hoặc bất cứ phần nào hoặc nội dung của nó) không cần thông báo.<br>- Chúng tôi sẽ không chịu trách nhiệm với bạn hoặc bất kỳ bên thứ ba về bất cứ sửa đổi nào, thay đổi giá, hệ thống treo hoặc dừng Dịch Vụ.</p>',
            'admin_id' => 1,
        ],
        [
            'title' => 'SẢN PHẨM',
            'content' => '<p>- Một số sản phẩm nào đó có thể có sẳn dành riêng cho trực tuyến thông qua trang web này.<br>- Những sản phẩm hoặc dịch vụ này có thể có giới hạn số lượng và vấn đề trả hàng hoặc đổi hàng chỉ tùy theo Chính Sách Trả Hàng của chúng tôi.<br>- Chúng tôi đã làm mọi cố gắng để hiển thị chính xác nhất có thể về màu sắc và hình ảnh sản phẩm của chúng tôi luôn hiện ra cửa hàng.<br>- Chúng tôi có quyền, nhưng không bắt buộc, giới hạn việc bán sản phẩm của chúng tôi hoặc Dịch Vụ cho bất cứ ai, vùng lãnh thổ hoặc thẩm quyền.  <br>- Chúng tôi có thể thực hiện quyền này trên cơ sở từng trường hợp.<br>- Hầu hết diễn giải về những sản phẩm hoặc giá đang áp dụng có thể thay đổi bất cứ lúc nào mà không cần thông báo, theo quyết định riêng của chúng tôi.<br>- Chúng tôi có quyền dừng bất kỳ sản phẩm nào vào bất kỳ thời điểm nào.<br>- Bất kỳ đề nghị cho bất kỳ sản phẩm nào trên trang web này là vô hiệu khi bị cấm.<br>- Chúng tôi không cho phép chất lượng, dịch vụ, thông tin của bất kỳ sản phẩm nào hoặc đơn đặt vật liệu hoặc thu được không đáp ứng kỳ vọng của bạn hoặc bất kỳ lỗi trong Dịch Vụ sẽ được sửa chữa.</p>',
            'admin_id' => 1,
        ],
        [
            'title' => 'CHÍNH XÁC THÔNG TIN HÓA ĐƠN VÀ TÀI KHOẢN',
            'content' => '<p>- Chúng tôi có quyền từ chối bất kỳ đơn hàng nào từ bạn.<br>- Chúng tôi có thể, theo quyết định riêng của chúng tôi, giới hạn hoặc hủy số lượng mua cho mỗi công ty, mỗi người, mỗi hộ gia đình hoặc mỗi đơn hàng.</p>',
            'admin_id' => 1,
        ],
    ];

    /**
     *
     */
    public static function insertSampleTerms()
    {
        $countTerms = 0;
        foreach (self::$termsInfoArr as $value) {
            $terms = new TermsAndServices();
            $terms->title = $value['title'];
            $terms->content = $value['content'];
            $terms->admin_id = $value['admin_id'];
            $terms->created_at = date('Y-m-d H:m:s');
            $terms->updated_at = date('Y-m-d H:m:s');
            if ($terms->save()) {
                $countTerms++;
            }
        }
        echo "Inserted " . $countTerms . '/' . count(self::$termsInfoArr) . ' terms.' . PHP_EOL;
    }

    /**
     * @var array|\string[][]
     */
    protected static $metaInfoArr = [
        [
            'key' => 'product_category_max_top_code',
            'value' => SystemConstant::PRODUCT_CATEGORY_TYPE_TOP . '3',
        ],
        [
            'key' => 'product_category_max_trousers_code',
            'value' => SystemConstant::PRODUCT_CATEGORY_TYPE_TROUSERS . '1',
        ],
        [
            'key' => 'product_category_max_accessories_code',
            'value' => SystemConstant::PRODUCT_CATEGORY_TYPE_ACCESSORIES . '1',
        ],
        [
            'key' => 'product_category_max_shoes_code',
            'value' => SystemConstant::PRODUCT_CATEGORY_TYPE_SHOES . '1',
        ],
    ];

    /**
     *
     */
    protected static function insertSampleMeta()
    {
        $countMeta = 0;
        foreach (self::$metaInfoArr as $value)
        {
            $meta = new Meta();
            $meta->key = $value['key'];
            $meta->value = $value['value'];
            if ($meta->save())
            {
                $countMeta++;
            }
        }
        echo "Inserted ".$countMeta.'/'.count(self::$metaInfoArr).' meta.'.PHP_EOL;
    }

    /**
     * @var array|\string[][]
     */
    protected static $postTagInfoArr = [
        [
            'title' => 'Street style',
            'slug' => 'street-style',
        ],
        [
            'title' => 'Trends',
            'slug' => 'trends',
        ],
        [
            'title' => 'Shopping tips',
            'slug' => 'shopping-tips',
        ],
        [
            'title' => 'Beauty',
            'slug' => 'beauty',
        ],
        [
            'title' => 'Office style',
            'slug' => 'office-style',
        ],
        [
            'title' => 'White collar',
            'slug' => 'white-collar',
        ],
        [
            'title' => 'Spring',
            'slug' => 'spring',
        ],
        [
            'title' => 'Summer',
            'slug' => 'summer',
        ],
        [
            'title' => 'Autumn',
            'slug' => 'autumn',
        ],
        [
            'title' => 'Winter',
            'slug' => 'winter',
        ],
    ];

    /**
     *
     */
    protected static function insertSamplePostTag()
    {
        $countTag = 0;
        foreach (self::$postTagInfoArr as $value)
        {
            $postTag = new PostTag();
            $postTag->title = $value['title'];
            $postTag->slug = $value['slug'];
            $postTag->created_at = date('Y-m-d H:m:s');
            $postTag->updated_at = date('Y-m-d H:m:s');
            if ($postTag->save())
            {
                $countTag++;
            }
        }
        echo "Inserted ".$countTag.'/'.count(self::$postTagInfoArr).' post tag.'.PHP_EOL;
    }

    protected static $postCategoryInfoArr = [
        [
            'title' => 'Fashion Design',
            'slug' => 'fashion-design',
        ],
        [
            'title' => 'Fashion Designers',
            'slug' => 'fashion-designers',
        ],
        [
            'title' => 'Fashion Events',
            'slug' => 'fashion-events',
        ],
        [
            'title' => 'Fashion Week',
            'slug' => 'fashion-week',
        ],
        [
            'title' => 'Fashion News',
            'slug' => 'fashion-news',
        ],
        [
            'title' => 'Fashion Technology',
            'slug' => 'fashion-technology',
        ],
        [
            'title' => 'Fashion Brand',
            'slug' => 'fashion-brand',
        ],
        [
            'title' => 'Uncategorized',
            'slug' => 'uncategorized',
        ],
    ];

    protected static function insertSamplePostCategory()
    {
        $countpostCate = 0;
        foreach (self::$postCategoryInfoArr as $value)
        {
            $postCate = new PostCategory();
            $postCate->title = $value['title'];
            $postCate->slug = $value['slug'];
            $postCate->created_at = date('Y-m-d H:m:s');
            $postCate->updated_at = date('Y-m-d H:m:s');
            if ($postCate->save())
            {
                $countpostCate++;
            }
        }
        echo "Inserted ".$countpostCate.'/'.count(self::$postCategoryInfoArr).' post category.'.PHP_EOL;
    }

    /**
     * @throws \yii\base\Exception
     */
    public static function importAllSampleData()
    {
        self::insertSampleUser();
        self::insertSampleProductCategory();
        self::insertSampleTrademark();
        self::insertSampleProduct();
        self::insertSamplePost();
        self::insertSampleTerms();
        self::insertSampleMeta();
        self::insertSamplePostTag();
        self::insertSamplePostCategory();
    }
}