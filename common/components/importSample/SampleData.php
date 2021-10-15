<?php

namespace common\components\importsample;

use common\components\SystemConstant;
use common\models\Color;
use common\models\Post;
use common\models\PostCategory;
use common\models\PostTag;
use common\models\Product;
use common\models\ProductAssoc;
use common\models\ProductCategory;
use common\models\ProductType;
use common\models\Size;
use common\models\TermsAndServices;
use common\models\Trademark;
use common\models\User;
use frontend\models\Slider;
use yii\base\Exception;

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
            'name' => "Admin",
            'tel' => '0364752421',
            'username' => 'admin',
            'role' => User::ROLE_ADMIN,
        ],
        [
            'email' => 'editor.deobelly@gmail.com',
            'password_hash' => 'Iameditor@1234',
            'name' => "Writer God",
            'tel' => '0334517566',
            'username' => 'editor',
            'role' => User::ROLE_EDITOR,
        ],
        [
            'email' => 'sale.deobelly@gmail.com',
            'password_hash' => 'Iamsale@1234',
            'name' => "Sale",
            'tel' => '0345678910',
            'username' => 'sale',
            'role' => User::ROLE_SALE,
        ],
        [
            'email' => 'customer.deobelly@gmail.com',
            'password_hash' => 'Iamcustomer@1234',
            'name' => "Customer",
            'tel' => '0333333333',
            'username' => 'customer',
            'role' => User::ROLE_USER,
        ],
        [
            'email' => 'customer2.deobelly@gmail.com',
            'password_hash' => 'Iamcustomer@1234',
            'name' => "Customer2",
            'tel' => '0339583763',
            'username' => 'customer2',
            'role' => User::ROLE_USER,
        ]
    ];

    /**
     *
     * @throws Exception
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
            'name' => 'Áo thun UNISEX không cổ BOSS',
            'slug' => 'ao-thun-unisex-khong-co-boss',
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
            'image' => 'product/clothes/top/shirt1.png',
            'images' => 'product/clothes/top/shirt1.png,product/clothes/top/shirt2.png,product/clothes/top/shirt3.png',
            'is_luxury' => 0,
            'trademark_id' => 1,
            'quantity' => 82,
            'admin_id' => 1,
        ],
        [
            'name' => 'Áo thun UNISEX không cổ HUGO-BOSS',
            'slug' => 'ao-thun-unisex-khong-co-hugo-boss',
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
            'image' => 'product/clothes/top/shirt6.png',
            'images' => 'product/clothes/top/shirt1.png,product/clothes/top/shirt2.png,product/clothes/top/shirt3.png',
            'is_luxury' => 0,
            'trademark_id' => 1,
            'admin_id' => 1,
        ],
        [
            'name' => 'Áo thun UNISEX không cổ',
            'slug' => 'ao-thun-unisex-khong-co',
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
            'image' => 'product/clothes/top/shirt3.png',
            'images' => 'product/clothes/top/shirt1.png,product/clothes/top/shirt2.png,product/clothes/top/shirt3.png',
            'is_luxury' => 0,
            'trademark_id' => 1,
            'admin_id' => 1,
        ],
        [
            'name' => 'Áo thun không cổ UNISEX',
            'slug' => 'ao-thun-khong-co-unisex',
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
            'image' => 'product/clothes/top/shirt5.png',
            'images' => 'product/clothes/top/shirt1.png,product/clothes/top/shirt2.png,product/clothes/top/shirt3.png',
            'is_luxury' => 0,
            'trademark_id' => 1,
            'quantity' => 142,
            'admin_id' => 1,
        ],
        [
            'name' => 'Áo thun không cổ nam',
            'slug' => 'ao-thun-khong-co-nam',
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
            'image' => 'product/clothes/top/shirt4.png',
            'images' => 'product/clothes/top/shirt1.png,product/clothes/top/shirt2.png,product/clothes/top/shirt3.png',
            'is_luxury' => 0,
            'gender' => SystemConstant::GENDER_MALE,
            'trademark_id' => 1,
            'admin_id' => 1,
        ],
        [
            'name' => 'Áo thun không cổ nữ',
            'slug' => 'ao-thun-khong-co-nu',
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
            'image' => 'product/clothes/top/shirt2.png',
            'images' => 'product/clothes/top/shirt1.png,product/clothes/top/shirt2.png,product/clothes/top/shirt3.png',
            'is_luxury' => 0,
            'gender' => SystemConstant::GENDER_FEMALE,
            'trademark_id' => 1,
            'quantity' => 97,
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
            'image' => 'product/clothes/shirt/ao-so-mi-lados.jpg',
            'images' => '',
            'is_luxury' => 1,
            'gender' => SystemConstant::GENDER_MALE,
            'trademark_id' => 2,
            'quantity' => 31,
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
            'image' => 'product/clothes/vest/vest-nam-han-quoc.jpg',
            'images' => '',
            'is_luxury' => 1,
            'gender' => SystemConstant::GENDER_MALE,
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
            $product = new Product();
            $product->name = $values['name'];
            $product->slug = $values['slug'];
            $product->short_description = $values['short_description'];
            $product->description = $values['description'];
            $product->cost_price = $values['cost_price'];
            $product->regular_price = $values['regular_price'];
            if (!empty($values['sale_price'])) {
                $product->sale_price = $values['sale_price'];
                $product->selling_price = $values['sale_price'];
            } else {
                $product->sale_price = null;
                $product->selling_price = $values['regular_price'];
            }
            $product->SKU = null;
            $product->image = $values['image'];
            $product->images = $values['images'];
            if (!empty($values['related_product'])) {
                $product->related_product = $values['related_product'];
            } else {
                $product->related_product = null;
            }
            if (!empty($values['is_luxury'])) {
                $product->is_luxury = $values['is_luxury'];
            }
            if (!empty($values['gender'])) {
                $product->gender = $values['gender'];
            }
            $product->trademark_id = $values['trademark_id'];
            if (!empty($values['quantity'])) {
                $product->quantity = $values['quantity'];
            }
            $product->created_at = date('Y-m-d H:m:s');
            $product->updated_at = date('Y-m-d H:m:s');
            $product->admin_id = $values['admin_id'];
            if ($product->save()) {
                $countProduct++;
            }
        }
        echo "Inserted " . $countProduct . '/' . count(self::$productInforArr) . ' products.' . PHP_EOL;
    }

    protected static $productAssocInfoArr = [
        [
            'product_id' => '1',
            'type_id' => '3,4,5',
            'category_id' => '2',
            'color_id' => '1,2',
            'size_id' => '3,4,5,6',
            'admin_id' => 1,
        ],
        [
            'product_id' => '2',
            'type_id' => '3,4,5',
            'category_id' => '2',
            'color_id' => '1,2',
            'size_id' => '3,4,5,6',
            'admin_id' => 1,
        ],
        [
            'product_id' => '3',
            'type_id' => '3,4,5',
            'category_id' => '2',
            'color_id' => '1,2',
            'size_id' => '3,4,5,6',
            'admin_id' => 1,
        ],
        [
            'product_id' => '4',
            'type_id' => '3,4,5',
            'category_id' => '2',
            'color_id' => '1,2',
            'size_id' => '3,4,5,6',
            'admin_id' => 1,
        ],
        [
            'product_id' => '5',
            'type_id' => '3,5',
            'category_id' => '2',
            'color_id' => '1,2',
            'size_id' => '3,4,5,6,7',
            'admin_id' => 1,
        ],
        [
            'product_id' => '6',
            'type_id' => '4,5',
            'category_id' => '2',
            'color_id' => '1,2,6',
            'size_id' => '3,4,5,6',
            'admin_id' => 1,
        ],
        [
            'product_id' => '7',
            'type_id' => '3,5',
            'category_id' => '1',
            'color_id' => '1,6,7',
            'size_id' => '3,4,5,6',
            'admin_id' => 1,
        ],
        [
            'product_id' => '8',
            'type_id' => '3,5,10',
            'category_id' => '3',
            'color_id' => '2,11,12',
            'size_id' => '3,4,5,6',
            'admin_id' => 1,
        ],
    ];

    public static function insertSampleProductAssoc()
    {
        $countAssoc = 0;
        foreach (self::$productAssocInfoArr as $values) {
            $assoc = new ProductAssoc();
            $assoc->product_id = $values['product_id'];
            $assoc->type_id = $values['type_id'];
            $assoc->category_id = $values['category_id'];
            if (!empty($values['color_id'])) {
                $assoc->color_id = $values['color_id'];
            }
            if (!empty($values['size_id'])) {
                $assoc->size_id = $values['size_id'];
            }
            $assoc->created_at = date('Y-m-d H:m:s');
            $assoc->updated_at = date('Y-m-d H:m:s');
            $assoc->admin_id = $values['admin_id'];
            if ($assoc->save()) {
                $countAssoc++;
            }
        }
        echo "Inserted " . $countAssoc . '/' . count(self::$productAssocInfoArr) . ' product assoc.' . PHP_EOL;
    }

    /**
     *  product category data
     * @var array[]
     */
    protected static $productCategoryInfoArr = [
        [
            'name' => 'Áo sơ mi',
            'slug' => 'ao-so-mi',
            'type_id' => '3,5',
            'admin_id' => 1,
        ],
        [
            'name' => 'Áo thun',
            'slug' => 'ao-thun',
            'type_id' => '3,4,5',
            'admin_id' => 1,
        ],
        [
            'name' => 'Áo Vest',
            'slug' => 'ao-vest',
            'type_id' => '3,5',
            'admin_id' => 1,
        ],
        [
            'name' => 'Quần âu',
            'slug' => 'quan-au',
            'type_id' => '3,4,6',
            'admin_id' => 1,
        ],
        [
            'name' => 'Dây lưng',
            'slug' => 'day-lung',
            'type_id' => '3,4,8',
            'admin_id' => 1,
        ],
        [
            'name' => 'Giày thể thao',
            'slug' => 'giay-the-thao',
            'type_id' => '3,4,7',
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
            $category = new ProductCategory();
            $category->name = $values['name'];
            $category->slug = $values['slug'];
            $category->type_id = $values['type_id'];
            $category->created_at = date('Y-m-d H:m:s');
            $category->updated_at = date('Y-m-d H:m:s');
            $category->admin_id = $values['admin_id'];
            if ($category->save()) {
                $countCategory++;
            }
        }
        echo "Inserted " . $countCategory . '/' . count(self::$productCategoryInfoArr) . ' product categories.' . PHP_EOL;
    }

    /**
     * @var \string[][]
     */
    protected static $arrProductType = [
        [
            'name' => 'Sản phẩm cao cấp',
            'slug' => 'san-pham-cao-cap',
            'image' => 'type/brand2.jpg',
            'admin_id' => 1,
        ],
        [
            'name' => 'Sản phẩm mới',
            'slug' => 'san-pham-moi',
            'image' => 'type/women.jpg',
            'admin_id' => 1,
        ],
        [
            'name' => 'Thời trang nam',
            'slug' => 'thoi-trang-nam',
            'image' => 'type/pronto-img-4.jpg',
            'admin_id' => 1,
        ],
        [
            'name' => 'Thời trang nữ',
            'slug' => 'thoi-trang-nu',
            'image' => 'type/pronto-img-2.jpg',
            'admin_id' => 1,
        ],
        [
            'name' => 'Áo',
            'slug' => 'ao',
            'image' => 'type/vest-nam-den.jpg',
            'admin_id' => 1,
        ],
        [
            'name' => 'Quần',
            'slug' => 'quan',
            'image' => 'type/quan-tay-ong-rong.jpg',
            'admin_id' => 1,
        ],
        [
            'name' => 'Giày',
            'slug' => 'giay',
            'image' => 'type/giay-derby-nam-1.jpg',
            'admin_id' => 1,
        ],
        [
            'name' => 'Phụ kiện',
            'slug' => 'phu-kien',
            'image' => 'type/GLT_1219.jpeg',
            'admin_id' => 1,
        ],
        [
            'name' => 'Quà tặng',
            'slug' => 'qua-tang',
            'image' => 'type/gift.jpg',
            'admin_id' => 1,
        ],
    ];

    /**
     *
     */
    public static function insertSampleProductType()
    {
        $countType = 0;
        foreach (self::$arrProductType as $value) {
            $model = new ProductType();
            $model->name = $value['name'];
            $model->slug = $value['slug'];
            $model->image = $value['image'];
            $model->admin_id = $value['admin_id'];
            $model->created_at = date('Y-m-d H:m:s');
            $model->updated_at = date('Y-m-d H:m:s');
            if ($model->save()) {
                $countType++;
            }
        }
        echo "Inserted " . $countType . '/' . count(self::$arrProductType) . ' product types.' . PHP_EOL;
    }

    /**
     * @var \string[][]
     */
    protected static $arrColor = [
        [
            'name' => 'White',
            'slug' => 'white',
            'color_code' => '#ffffff',
            'admin_id' => 1,
        ],
        [
            'name' => 'Black',
            'slug' => 'black',
            'color_code' => '#000000',
            'admin_id' => 1,
        ],
        [
            'name' => 'Red',
            'slug' => 'red',
            'color_code' => '#ff0000',
            'admin_id' => 1,
        ],
        [
            'name' => 'Green',
            'slug' => 'green',
            'color_code' => '#008000',
            'admin_id' => 1,
        ],
        [
            'name' => 'Yellow',
            'slug' => 'yellow',
            'color_code' => '#FFFF00',
            'admin_id' => 1,
        ],
        [
            'name' => 'Blue',
            'slug' => 'blue',
            'color_code' => '#0000FF',
            'admin_id' => 1,
        ],
        [
            'name' => 'Light blue',
            'slug' => 'light-blue',
            'color_code' => '#ADD8E6',
            'admin_id' => 1,
        ],
        [
            'name' => 'Cyan',
            'slug' => 'Cyan',
            'color_code' => '#00FFFF',
            'admin_id' => 1,
        ],
        [
            'name' => 'Dark blue',
            'slug' => 'dark-blue',
            'color_code' => '#00008B',
            'admin_id' => 1,
        ],
        [
            'name' => 'Pink',
            'slug' => 'pink',
            'color_code' => '#FFC0CB',
            'admin_id' => 1,
        ],
        [
            'name' => 'Gray',
            'slug' => 'gray',
            'color_code' => '#808080',
            'admin_id' => 1,
        ],
        [
            'name' => 'Brown',
            'slug' => 'brown',
            'color_code' => '#663300',
            'admin_id' => 1,
        ],
        [
            'name' => 'Orange',
            'slug' => 'orange',
            'color_code' => '#ffa500',
            'admin_id' => 1,
        ],
    ];

    /**
     *
     */
    public static function insertSampleColor()
    {
        $countColor = 0;
        foreach (self::$arrColor as $value) {
            $color = new Color();
            $color->name = $value['name'];
            $color->slug = $value['slug'];
            $color->color_code = $value['color_code'];
            $color->admin_id = $value['admin_id'];
            $color->created_at = date('Y-m-d H:m:s');
            $color->updated_at = date('Y-m-d H:m:s');
            if ($color->save()) {
                $countColor++;
            }
        }
        echo "Inserted " . $countColor . '/' . count(self::$arrColor) . ' product colour.' . PHP_EOL;
    }

    /**
     * @var \string[][]
     */
    protected static $arrSize = [
        [
            'name' => 'XXS',
            'slug' => 'xxs',
            'admin_id' => 1,
        ],
        [
            'name' => 'XS',
            'slug' => 'xs',
            'admin_id' => 1,
        ],
        [
            'name' => 'S',
            'slug' => 's',
            'admin_id' => 1,
        ],
        [
            'name' => 'M',
            'slug' => 'm',
            'admin_id' => 1,
        ],
        [
            'name' => 'L',
            'slug' => 'l',
            'admin_id' => 1,
        ],
        [
            'name' => 'XL',
            'slug' => 'xl',
            'admin_id' => 1,
        ],
        [
            'name' => 'XXL',
            'slug' => 'xxl',
            'admin_id' => 1,
        ],
        [
            'name' => '36',
            'slug' => '36',
            'admin_id' => 1,
        ],
        [
            'name' => '37',
            'slug' => '37',
            'admin_id' => 1,
        ],
        [
            'name' => '38',
            'slug' => '38',
            'admin_id' => 1,
        ],
        [
            'name' => '39',
            'slug' => '39',
            'admin_id' => 1,
        ],
        [
            'name' => '40',
            'slug' => '40',
            'admin_id' => 1,
        ],
        [
            'name' => '41',
            'slug' => '41',
            'admin_id' => 1,
        ],
        [
            'name' => '42',
            'slug' => '42',
            'admin_id' => 1,
        ],
        [
            'name' => '43',
            'slug' => '43',
            'admin_id' => 1,
        ],
    ];

    /**
     *
     */
    public static function insertSampleSize()
    {
        $countSize = 0;
        foreach (self::$arrSize as $value) {
            $size = new Size();
            $size->name = $value['name'];
            $size->slug = $value['slug'];
            $size->admin_id = $value['admin_id'];
            $size->created_at = date('Y-m-d H:m:s');
            $size->updated_at = date('Y-m-d H:m:s');
            if ($size->save()) {
                $countSize++;
            }
        }
        echo "Inserted " . $countSize . '/' . count(self::$arrSize) . ' product sizes.' . PHP_EOL;
    }

    /**
     *  trademark data
     * @var array[]
     */
    protected static $trademarkInfoArr = [
        [
            'name' => 'HUGO',
            'slug' => 'hugo',
            'admin_id' => 1,
        ],
        [
            'name' => 'LADOS',
            'slug' => 'lados',
            'admin_id' => 1,
        ],
        [
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
            'avatar' => 'post/avatar/winter-fashion.jpg',
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
            'avatar' => 'post/avatar/winter-fashion.jpg',
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
            'avatar' => 'post/avatar/winter-fashion.jpg',
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
            'avatar' => 'post/avatar/winter-fashion.jpg',
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
     * @var array|string[][]
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
        foreach (self::$postTagInfoArr as $value) {
            $postTag = new PostTag();
            $postTag->title = $value['title'];
            $postTag->slug = $value['slug'];
            $postTag->created_at = date('Y-m-d H:m:s');
            $postTag->updated_at = date('Y-m-d H:m:s');
            if ($postTag->save()) {
                $countTag++;
            }
        }
        echo "Inserted " . $countTag . '/' . count(self::$postTagInfoArr) . ' post tag.' . PHP_EOL;
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
        $countPostCate = 0;
        foreach (self::$postCategoryInfoArr as $value) {
            $postCate = new PostCategory();
            $postCate->title = $value['title'];
            $postCate->slug = $value['slug'];
            $postCate->created_at = date('Y-m-d H:m:s');
            $postCate->updated_at = date('Y-m-d H:m:s');
            if ($postCate->save()) {
                $countPostCate++;
            }
        }
        echo "Inserted " . $countPostCate . '/' . count(self::$postCategoryInfoArr) . ' post category.' . PHP_EOL;
    }

    protected static $arrSliderInfo = [
        [
            'link' => 'slider/sliderItems1.jpg',
            'site' => 'index',
            'slide_label' => 'First slide label',
            'slide_text' => 'No life is free right now, sometimes soft against vibrations',
            'admin_id' => 1,
        ],
        [
            'link' => 'slider/sliderItems2.jpg',
            'site' => 'index',
            'slide_label' => 'Second slide label',
            'slide_text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
            'admin_id' => 1,
        ],
        [
            'link' => 'slider/slider1.jpg',
            'site' => 'index',
            'slide_label' => 'Third slide label',
            'slide_text' => 'Praesent commodo cursus magna, vel scelerisque nisl consectetur',
            'admin_id' => 1,
        ],
        [
            'link' => 'slider/slider1.jpg',
            'site' => 'our-stories',
            'slide_label' => null,
            'slide_text' => null,
            'admin_id' => 1,
        ],
        [
            'link' => 'slider/slider1.jpg',
            'site' => 'our-stories',
            'slide_label' => null,
            'slide_text' => null,
            'admin_id' => 1,
        ],
        [
            'link' => 'slider/slider1.jpg',
            'site' => 'our-stories',
            'slide_label' => null,
            'slide_text' => null,
            'admin_id' => 1,
        ],
    ];

    protected static function insertSlider()
    {
        $count = 0;
        foreach (self::$arrSliderInfo as $value) {
            $slider = new Slider();
            $slider->link = $value['link'];
            $slider->site = $value['site'];
            $slider->admin_id = $value['admin_id'];
            $slider->created_at = date('Y-m-d H:m:s');
            $slider->updated_at = date('Y-m-d H:m:s');
            if ($slider->save()) {
                $count++;
            }
        }
        echo "Inserted " . $count . '/' . count(self::$arrSliderInfo) . ' slider links.' . PHP_EOL;
    }

    /**
     * @throws Exception
     */
    public static function importAllSampleData()
    {
        self::insertSampleUser();
        self::insertSampleProduct();
        self::insertSampleProductAssoc();
        self::insertSampleProductType();
        self::insertSampleProductCategory();
        self::insertSampleColor();
        self::insertSampleSize();
        self::insertSampleTrademark();
        self::insertSamplePost();
        self::insertSamplePostTag();
        self::insertSamplePostCategory();
        self::insertSampleTerms();
        self::insertSlider();
    }
}