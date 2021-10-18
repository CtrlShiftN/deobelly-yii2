<?php

namespace common\components\importsample;

use common\components\helpers\StringHelper;
use common\components\SystemConstant;
use common\models\Cart;
use common\models\Color;
use common\models\GeoLocation;
use common\models\Order;
use common\models\OrderTracking;
use common\models\Post;
use common\models\PostCategory;
use common\models\PostTag;
use common\models\Product;
use common\models\ProductAssoc;
use common\models\ProductCategory;
use common\models\ProductType;
use common\models\Size;
use common\models\TermsAndServices;
use common\models\TrackingStatus;
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
            'trademark_id' => 1,
            'quantity' => 142,
            'admin_id' => 1,
        ],
        [
            'name' => 'Áo thun không cổ HUGO BOSS',
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
            'cost_price' => 300000,
            'regular_price' => 599000,
            'sale_price' => null,
            'image' => 'product/clothes/top/shirt4.png',
            'images' => 'product/clothes/top/shirt1.png,product/clothes/top/shirt2.png,product/clothes/top/shirt3.png',
            'trademark_id' => 1,
            'admin_id' => 1,
        ],
        [
            'name' => 'Áo T-shirt HUGO BOSS',
            'slug' => 'ao-t-shirt-hugo-boss',
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
            'type_id' => '2,4',
            'category_id' => '2',
            'color_id' => '1,2',
            'size_id' => '3,4,5,6',
            'admin_id' => 1,
        ],
        [
            'product_id' => '2',
            'type_id' => '2,4',
            'category_id' => '2',
            'color_id' => '1,2',
            'size_id' => '3,4,5,6',
            'admin_id' => 1,
        ],
        [
            'product_id' => '3',
            'type_id' => '2,4',
            'category_id' => '2',
            'color_id' => '1,2',
            'size_id' => '3,4,5,6',
            'admin_id' => 1,
        ],
        [
            'product_id' => '4',
            'type_id' => '2,4',
            'category_id' => '2',
            'color_id' => '1,2',
            'size_id' => '3,4,5,6',
            'admin_id' => 1,
        ],
        [
            'product_id' => '5',
            'type_id' => '2,4',
            'category_id' => '2',
            'color_id' => '1,2',
            'size_id' => '3,4,5,6,7',
            'admin_id' => 1,
        ],
        [
            'product_id' => '6',
            'type_id' => '2,4',
            'category_id' => '2',
            'color_id' => '1,2,6',
            'size_id' => '3,4,5,6',
            'admin_id' => 1,
        ],
        [
            'product_id' => '7',
            'type_id' => '1,4,8',
            'category_id' => '1',
            'color_id' => '1,6,7',
            'size_id' => '3,4,5,6',
            'admin_id' => 1,
        ],
        [
            'product_id' => '8',
            'type_id' => '1,4,8',
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
            'type_id' => '1,2,4,8',
            'admin_id' => 1,
        ],
        [
            'name' => 'Áo thun',
            'slug' => 'ao-thun',
            'type_id' => '2,4',
            'admin_id' => 1,
        ],
        [
            'name' => 'Áo Vest',
            'slug' => 'ao-vest',
            'type_id' => '1,2,4,8',
            'admin_id' => 1,
        ],
        [
            'name' => 'Quần âu',
            'slug' => 'quan-au',
            'type_id' => '1,2,5,8',
            'admin_id' => 1,
        ],
        [
            'name' => 'Dây lưng',
            'slug' => 'day-lung',
            'type_id' => '2,7,8',
            'admin_id' => 1,
        ],
        [
            'name' => 'Giày thể thao',
            'slug' => 'giay-the-thao',
            'type_id' => '1,2,6,8',
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
            'name' => 'Luxury',
            'slug' => 'luxury',
            'image' => 'type/pronto-img-4.jpg',
            'admin_id' => 1,
        ],
        [
            'name' => 'Casual',
            'slug' => 'casual',
            'image' => 'type/pronto-img-2.jpg',
            'admin_id' => 1,
        ],
        [
            'name' => 'Sản phẩm mới',
            'slug' => 'san-pham-moi',
            'image' => 'type/brand2.jpg',
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

    /**
     * @var \string[][]
     */
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

    /**
     *
     */
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

    /**
     * @var array[]
     */
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

    /**
     *
     */
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
     * @var array[]
     */
    protected static $arrCartInfo = [
        [
            'user_id' => 4,
            'product_id' => '7',
            'color_id' => 1,
            'size_id' => 6,
            'quantity' => 3,
        ],
    ];

    /**
     *
     */
    protected static function insertSampleCart()
    {
        $countCart = 0;
        foreach (self::$arrCartInfo as $value) {
            $cart = new Cart();
            $cart->user_id = $value['user_id'];
            $cart->product_id = $value['product_id'];
            if (!empty($value['color_id'])) {
                $cart->color_id = $value['color_id'];
            }
            if (!empty($value['size_id'])) {
                $cart->size_id = $value['size_id'];
            }
            $cart->quantity = $value['quantity'];
            $cart->total_price = $value['quantity'] * \frontend\models\Product::getPriceProductById($value['product_id']);
            $cart->created_at = date('Y-m-d H:m:s');
            $cart->updated_at = date('Y-m-d H:m:s');
            if ($cart->save()) {
                $countCart++;
            }
        }
        echo "Inserted " . $countCart . '/' . count(self::$arrCartInfo) . ' carts.' . PHP_EOL;
    }

    /**
     * @var array[]
     */
    protected static $arrOrderInfo = [
        [
            'user_id' => 4,
            'product_id' => '7',
            'color_id' => 1,
            'size_id' => 6,
            'quantity' => 3,
            'province' => 'Thái Bình',
            'district' => 'Huyện Hưng Hà',
            'village' => 'Thị trấn Hưng Hà',
            'specific_address' => 'Tổ dân phố Đãn Chàng',
            'tel' => '0334517566',
            'admin_id' => 1,
        ],
        [
            'user_id' => 4,
            'product_id' => '8',
            'color_id' => 1,
            'size_id' => 5,
            'quantity' => 1,
            'province' => 'Thái Bình',
            'district' => 'Huyện Hưng Hà',
            'village' => 'Thị trấn Hưng Hà',
            'specific_address' => 'Tổ dân phố Đãn Chàng',
            'tel' => '0334517566',
            'admin_id' => 1,
        ],
        [
            'user_id' => 4,
            'product_id' => '5',
            'color_id' => 2,
            'size_id' => 6,
            'quantity' => 6,
            'province' => 'Thái Bình',
            'district' => 'Huyện Hưng Hà',
            'village' => 'Thị trấn Hưng Hà',
            'specific_address' => 'Tổ dân phố Đãn Chàng',
            'tel' => '0334517566',
            'admin_id' => 1,
        ],
        [
            'user_id' => 4,
            'product_id' => '3',
            'color_id' => 2,
            'size_id' => 4,
            'quantity' => 1,
            'province' => 'Hà Nội',
            'district' => 'Cầu Giấy',
            'village' => 'Mai Dịch',
            'specific_address' => '128A Hồ Tùng Mậu',
            'tel' => '0334517566',
            'admin_id' => 1,
        ],
        [
            'user_id' => 5,
            'product_id' => '8',
            'color_id' => 2,
            'size_id' => 5,
            'quantity' => 1,
            'province' => 'Hà Nội',
            'district' => 'Cầu Giấy',
            'village' => 'Mai Dịch',
            'specific_address' => '37C1 Ngõ 20',
            'tel' => '0334517566',
            'admin_id' => 1,
        ],
        [
            'user_id' => 5,
            'product_id' => '6',
            'color_id' => 2,
            'size_id' => 3,
            'quantity' => 2,
            'province' => 'Hà Nội',
            'district' => 'Cầu Giấy',
            'village' => 'Mai Dịch',
            'specific_address' => '37C1 Ngõ 20',
            'tel' => '0394548299',
            'admin_id' => 1,
        ],
        [
            'user_id' => 5,
            'product_id' => '8',
            'color_id' => 2,
            'size_id' => 6,
            'quantity' => 1,
            'province' => 'Hà Nội',
            'district' => 'Cầu Giấy',
            'village' => 'Mai Dịch',
            'specific_address' => '37C1 Ngõ 20',
            'tel' => '0394548299',
            'admin_id' => 1,
        ],
        [
            'user_id' => 5,
            'product_id' => '4',
            'color_id' => 2,
            'size_id' => 6,
            'quantity' => 1,
            'province' => 'Hà Nội',
            'district' => 'Cầu Giấy',
            'village' => 'Mai Dịch',
            'specific_address' => '105 Doãn Kế Thiện',
            'tel' => '0394548299',
            'admin_id' => 1,
        ],
    ];

    /**
     *
     */
    protected static function insertSampleOrder()
    {
        $countOrder = 0;
        foreach (self::$arrOrderInfo as $value) {
            $order = new Order();
            $order->user_id = $value['user_id'];
            $order->product_id = $value['product_id'];
            if (!empty($value['color_id'])) {
                $order->color_id = $value['color_id'];
            }
            if (!empty($value['size_id'])) {
                $order->size_id = $value['size_id'];
            }
            $order->quantity = $value['quantity'];
            $order->province = $value['province'];
            $order->district = $value['district'];
            $order->village = $value['village'];
            $order->specific_address = $value['specific_address'];
            $order->address = $value['specific_address'] . ', ' . $value['village'] . ', ' . $value['district'] . ', ' . $value['province'];
            $order->tel = $value['tel'];
            $order->admin_id = $value['admin_id'];
            $order->created_at = date('Y-m-d H:m:s');
            $order->updated_at = date('Y-m-d H:m:s');
            $order->status = rand(1, 8);
            if ($order->save()) {
                $countOrder++;
            }
        }
        echo "Inserted " . $countOrder . '/' . count(self::$arrOrderInfo) . ' orders.' . PHP_EOL;
    }

    /**
     * @var array[]
     */
    protected static $arrOrderTrackingInfo = [
        [
            'order_id' => 1,
            'admin_id' => '1',
            'action' => 4,
        ],
        [
            'order_id' => 2,
            'admin_id' => '1',
            'action' => 4,
        ],
        [
            'order_id' => 3,
            'admin_id' => '1',
            'action' => 5,
        ],
        [
            'order_id' => 4,
            'admin_id' => '1',
            'action' => 0,
        ],
        [
            'order_id' => 5,
            'admin_id' => '1',
            'action' => 4,
        ],
        [
            'order_id' => 6,
            'admin_id' => '1',
            'action' => 5,
        ],
        [
            'order_id' => 7,
            'admin_id' => '1',
            'action' => 10,
        ],
        [
            'order_id' => 8,
            'admin_id' => '1',
            'action' => 1,
        ],
    ];

    /**
     *
     */
    protected static function insertSampleOrderTracking()
    {
        $countOrderTracking = 0;
        foreach (self::$arrOrderTrackingInfo as $value) {
            $orderTracking = new OrderTracking();
            $orderTracking->order_id = $value['order_id'];
            $orderTracking->admin_id = $value['admin_id'];
            $orderTracking->action = $value['action'];
            $orderTracking->created_at = date('Y-m-d H:m:s');
            $orderTracking->updated_at = date('Y-m-d H:m:s');
            if ($orderTracking->save()) {
                $countOrderTracking++;
            }
        }
        echo "Inserted " . $countOrderTracking . '/' . count(self::$arrOrderTrackingInfo) . ' order tracking.' . PHP_EOL;
    }

    protected static $arrTrackingStatus = [
        'New',
        'Processing',
        'Approved',
        'Shipping',
        'Delivered',
        'Cancelled',
        'Expired',
        'Refunded',
        'Postpone',
        'Rejected',
        'Failed',
    ];

    public static function insertSampleTrackingStatus()
    {
        $count = 0;
        foreach (self::$arrTrackingStatus as $status) {
            $model = new TrackingStatus();
            $model->name = $status;
            $model->slug = StringHelper::toSlug($status);
            $model->admin_id = 1;
            $model->created_at = date('Y-m-d H:m:s');
            $model->updated_at = date('Y-m-d H:m:s');
            if ($model->save()) {
                $count++;
            }
        }
        echo "Inserted " . $count . '/' . count(self::$arrTrackingStatus) . ' tracking status.' . PHP_EOL;
    }

    protected static $arrWardDistrictProvince = [
        'Thành phố Hà Nội' => [
            'Quận Ba Đình' => 'Phường Phúc Xá,Phường Trúc Bạch,Phường Vĩnh Phúc,Phường Cống Vị,Phường Liễu Giai,Phường Nguyễn Trung Trực,Phường Quán Thánh,Phường Ngọc Hà,Phường Điện Biên,Phường Đội Cấn,Phường Ngọc Khánh,Phường Kim Mã,Phường Giảng Võ,Phường Thành Công',
            'Quận Hoàn Kiếm' => 'Phường Phúc Tân,Phường Đồng Xuân,Phường Hàng Mã,Phường Hàng Buồm,Phường Hàng Đào,Phường Hàng Bồ,Phường Cửa Đông,Phường Lý Thái Tổ,Phường Hàng Bạc,Phường Hàng Gai,Phường Chương Dương,Phường Hàng Trống,Phường Cửa Nam,Phường Hàng Bông,Phường Tràng Tiền,Phường Trần Hưng Đạo,Phường Phan Chu Trinh,Phường Hàng Bài',
            'Quận Tây Hồ' => 'Phường Phú Thượng,Phường Nhật Tân,Phường Tứ Liên,Phường Quảng An,Phường Xuân La,Phường Yên Phụ,Phường Bưởi,Phường Thụy Khuê',
            'Quận Long Biên' => 'Phường Thượng Thanh,Phường Ngọc Thụy,Phường Giang Biên,Phường Đức Giang,Phường Việt Hưng,Phường Gia Thụy,Phường Ngọc Lâm,Phường Phúc Lợi,Phường Bồ Đề,Phường Sài Đồng,Phường Long Biên,Phường Thạch Bàn,Phường Phúc Đồng,Phường Cự Khối',
            'Quận Cầu Giấy' => 'Phường Nghĩa Đô,Phường Nghĩa Tân,Phường Mai Dịch,Phường Dịch Vọng,Phường Dịch Vọng Hậu,Phường Quan Hoa,Phường Yên Hoà,Phường Trung Hoà',
            'Quận Đống Đa' => 'Phường Cát Linh,Phường Văn Miếu,Phường Quốc Tử Giám,Phường Láng Thượng,Phường Ô Chợ Dừa,Phường Văn Chương,Phường Hàng Bột,Phường Láng Hạ,Phường Khâm Thiên,Phường Thổ Quan,Phường Nam Đồng,Phường Trung Phụng,Phường Quang Trung,Phường Trung Liệt,Phường Phương Liên,Phường Thịnh Quang,Phường Trung Tự,Phường Kim Liên,Phường Phương Mai,Phường Ngã Tư Sở,Phường Khương Thượng',
            'Quận Hai Bà Trưng' => 'Phường Nguyễn Du,Phường Bạch Đằng,Phường Phạm Đình Hổ,Phường Lê Đại Hành,Phường Đồng Nhân,Phường Phố Huế,Phường Đống Mác,Phường Thanh Lương,Phường Thanh Nhàn,Phường Cầu Dền,Phường Bách Khoa,Phường Đồng Tâm,Phường Vĩnh Tuy,Phường Bạch Mai,Phường Quỳnh Mai,Phường Quỳnh Lôi,Phường Minh Khai,Phường Trương Định',
            'Quận Hoàng Mai' => 'Phường Thanh Trì,Phường Vĩnh Hưng,Phường Định Công,Phường Mai Động,Phường Tương Mai,Phường Đại Kim,Phường Tân Mai,Phường Hoàng Văn Thụ,Phường Giáp Bát,Phường Lĩnh Nam,Phường Thịnh Liệt,Phường Trần Phú,Phường Hoàng Liệt,Phường Yên Sở',
            'Quận Thanh Xuân' => 'Phường Nhân Chính,Phường Thượng Đình,Phường Khương Trung,Phường Khương Mai,Phường Thanh Xuân Trung,Phường Phương Liệt,Phường Hạ Đình,Phường Khương Đình,Phường Thanh Xuân Bắc,Phường Thanh Xuân Nam,Phường Kim Giang',
            'Huyện Sóc Sơn' => 'Thị trấn Sóc Sơn,Xã Bắc Sơn,Xã Minh Trí,Xã Hồng Kỳ,Xã Nam Sơn,Xã Trung Giã,Xã Tân Hưng,Xã Minh Phú,Xã Phù Linh,Xã Bắc Phú,Xã Tân Minh,Xã Quang Tiến,Xã Hiền Ninh,Xã Tân Dân,Xã Tiên Dược,Xã Việt Long,Xã Xuân Giang,Xã Mai Đình,Xã Đức Hoà,Xã Thanh Xuân,Xã Đông Xuân,Xã Kim Lũ,Xã Phú Cường,Xã Phú Minh,Xã Phù Lỗ,Xã Xuân Thu',
            'Huyện Đông Anh' => 'Thị trấn Đông Anh,Xã Xuân Nộn,Xã Thuỵ Lâm,Xã Bắc Hồng,Xã Nguyên Khê,Xã Nam Hồng,Xã Tiên Dương,Xã Vân Hà,Xã Uy Nỗ,Xã Vân Nội,Xã Liên Hà,Xã Việt Hùng,Xã Kim Nỗ,Xã Kim Chung,Xã Dục Tú,Xã Đại Mạch,Xã Vĩnh Ngọc,Xã Cổ Loa,Xã Hải Bối,Xã Xuân Canh,Xã Võng La,Xã Tàm Xá,Xã Mai Lâm,Xã Đông Hội',
            'Huyện Gia Lâm' => 'Thị trấn Yên Viên,Xã Yên Thường,Xã Yên Viên,Xã Ninh Hiệp,Xã Đình Xuyên,Xã Dương Hà,Xã Phù Đổng,Xã Trung Mầu,Xã Lệ Chi,Xã Cổ Bi,Xã Đặng Xá,Xã Phú Thị,Xã Kim Sơn,Thị trấn Trâu Quỳ,Xã Dương Quang,Xã Dương Xá,Xã Đông Dư,Xã Đa Tốn,Xã Kiêu Kỵ,Xã Bát Tràng,Xã Kim Lan,Xã Văn Đức',
            'Quận Nam Từ Liêm' => 'Phường Cầu Diễn,Phường Xuân Phương,Phường Phương Canh,Phường Mỹ Đình 1,Phường Mỹ Đình 2,Phường Tây Mỗ,Phường Mễ Trì,Phường Phú Đô,Phường Đại Mỗ,Phường Trung Văn',
            'Huyện Thanh Trì' => 'Thị trấn Văn Điển,Xã Tân Triều,Xã Thanh Liệt,Xã Tả Thanh Oai,Xã Hữu Hoà,Xã Tam Hiệp,Xã Tứ Hiệp,Xã Yên Mỹ,Xã Vĩnh Quỳnh,Xã Ngũ Hiệp,Xã Duyên Hà,Xã Ngọc Hồi,Xã Vạn Phúc,Xã Đại áng,Xã Liên Ninh,Xã Đông Mỹ',
            'Quận Bắc Từ Liêm' => 'Phường Thượng Cát,Phường Liên Mạc,Phường Đông Ngạc,Phường Đức Thắng,Phường Thụy Phương,Phường Tây Tựu,Phường Xuân Đỉnh,Phường Xuân Tảo,Phường Minh Khai,Phường Cổ Nhuế 1,Phường Cổ Nhuế 2,Phường Phú Diễn,Phường Phúc Diễn',
            'Huyện Mê Linh' => 'Thị trấn Chi Đông,Xã Đại Thịnh,Xã Kim Hoa,Xã Thạch Đà,Xã Tiến Thắng,Xã Tự Lập,Thị trấn Quang Minh,Xã Thanh Lâm,Xã Tam Đồng,Xã Liên Mạc,Xã Vạn Yên,Xã Chu Phan,Xã Tiến Thịnh,Xã Mê Linh,Xã Văn Khê,Xã Hoàng Kim,Xã Tiền Phong,Xã Tráng Việt',
            'Quận Hà Đông' => 'Phường Nguyễn Trãi,Phường Mộ Lao,Phường Văn Quán,Phường Vạn Phúc,Phường Yết Kiêu,Phường Quang Trung,Phường La Khê,Phường Phú La,Phường Phúc La,Phường Hà Cầu,Phường Yên Nghĩa,Phường Kiến Hưng,Phường Phú Lãm,Phường Phú Lương,Phường Dương Nội,Phường Đồng Mai,Phường Biên Giang',
            'Thị xã Sơn Tây' => 'Phường Lê Lợi,Phường Phú Thịnh,Phường Ngô Quyền,Phường Quang Trung,Phường Sơn Lộc,Phường Xuân Khanh,Xã Đường Lâm,Phường Viên Sơn,Xã Xuân Sơn,Phường Trung Hưng,Xã Thanh Mỹ,Phường Trung Sơn Trầm,Xã Kim Sơn,Xã Sơn Đông,Xã Cổ Đông',
            'Huyện Ba Vì' => 'Thị trấn Tây Đằng,Xã Phú Cường,Xã Cổ Đô,Xã Tản Hồng,Xã Vạn Thắng,Xã Châu Sơn,Xã Phong Vân,Xã Phú Đông,Xã Phú Phương,Xã Phú Châu,Xã Thái Hòa,Xã Đồng Thái,Xã Phú Sơn,Xã Minh Châu,Xã Vật Lại,Xã Chu Minh,Xã Tòng Bạt,Xã Cẩm Lĩnh,Xã Sơn Đà,Xã Đông Quang,Xã Tiên Phong,Xã Thụy An,Xã Cam Thượng,Xã Thuần Mỹ,Xã Tản Lĩnh,Xã Ba Trại,Xã Minh Quang,Xã Ba Vì,Xã Vân Hòa,Xã Yên Bài,Xã Khánh Thượng',
            'Huyện Phúc Thọ' => 'Thị trấn Phúc Thọ,Xã Vân Hà,Xã Vân Phúc,Xã Vân Nam,Xã Xuân Đình,Xã Sen Phương,Xã Võng Xuyên,Xã Thọ Lộc,Xã Long Xuyên,Xã Thượng Cốc,Xã Hát Môn,Xã Tích Giang,Xã Thanh Đa,Xã Trạch Mỹ Lộc,Xã Phúc Hòa,Xã Ngọc Tảo,Xã Phụng Thượng,Xã Tam Thuấn,Xã Tam Hiệp,Xã Hiệp Thuận,Xã Liên Hiệp',
            'Huyện Đan Phượng' => 'Thị trấn Phùng,Xã Trung Châu,Xã Thọ An,Xã Thọ Xuân,Xã Hồng Hà,Xã Liên Hồng,Xã Liên Hà,Xã Hạ Mỗ,Xã Liên Trung,Xã Phương Đình,Xã Thượng Mỗ,Xã Tân Hội,Xã Tân Lập,Xã Đan Phượng,Xã Đồng Tháp,Xã Song Phượng',
            'Huyện Hoài Đức' => 'Thị trấn Trạm Trôi,Xã Đức Thượng,Xã Minh Khai,Xã Dương Liễu,Xã Di Trạch,Xã Đức Giang,Xã Cát Quế,Xã Kim Chung,Xã Yên Sở,Xã Sơn Đồng,Xã Vân Canh,Xã Đắc Sở,Xã Lại Yên,Xã Tiền Yên,Xã Song Phương,Xã An Khánh,Xã An Thượng,Xã Vân Côn,Xã La Phù,Xã Đông La',
            'Huyện Quốc Oai' => 'Xã Đông Xuân,Thị trấn Quốc Oai,Xã Sài Sơn,Xã Phượng Cách,Xã Yên Sơn,Xã Ngọc Liệp,Xã Ngọc Mỹ,Xã Liệp Tuyết,Xã Thạch Thán,Xã Đồng Quang,Xã Phú Cát,Xã Tuyết Nghĩa,Xã Nghĩa Hương,Xã Cộng Hòa,Xã Tân Phú,Xã Đại Thành,Xã Phú Mãn,Xã Cấn Hữu,Xã Tân Hòa,Xã Hòa Thạch,Xã Đông Yên',
            'Huyện Thạch Thất' => 'Xã Yên Trung,Xã Yên Bình,Xã Tiến Xuân,Thị trấn Liên Quan,Xã Đại Đồng,Xã Cẩm Yên,Xã Lại Thượng,Xã Phú Kim,Xã Hương Ngải,Xã Canh Nậu,Xã Kim Quan,Xã Dị Nậu,Xã Bình Yên,Xã Chàng Sơn,Xã Thạch Hoà,Xã Cần Kiệm,Xã Hữu Bằng,Xã Phùng Xá,Xã Tân Xã,Xã Thạch Xá,Xã Bình Phú,Xã Hạ Bằng,Xã Đồng Trúc',
            'Huyện Chương Mỹ' => 'Thị trấn Chúc Sơn,Thị trấn Xuân Mai,Xã Phụng Châu,Xã Tiên Phương,Xã Đông Sơn,Xã Đông Phương Yên,Xã Phú Nghĩa,Xã Trường Yên,Xã Ngọc Hòa,Xã Thủy Xuân Tiên,Xã Thanh Bình,Xã Trung Hòa,Xã Đại Yên,Xã Thụy Hương,Xã Tốt Động,Xã Lam Điền,Xã Tân Tiến,Xã Nam Phương Tiến,Xã Hợp Đồng,Xã Hoàng Văn Thụ,Xã Hoàng Diệu,Xã Hữu Văn,Xã Quảng Bị,Xã Mỹ Lương,Xã Thượng Vực,Xã Hồng Phong,Xã Đồng Phú,Xã Trần Phú,Xã Văn Võ,Xã Đồng Lạc,Xã Hòa Chính,Xã Phú Nam An',
            'Huyện Thanh Oai' => 'Thị trấn Kim Bài,Xã Cự Khê,Xã Bích Hòa,Xã Mỹ Hưng,Xã Cao Viên,Xã Bình Minh,Xã Tam Hưng,Xã Thanh Cao,Xã Thanh Thùy,Xã Thanh Mai,Xã Thanh Văn,Xã Đỗ Động,Xã Kim An,Xã Kim Thư,Xã Phương Trung,Xã Tân Ước,Xã Dân Hòa,Xã Liên Châu,Xã Cao Dương,Xã Xuân Dương,Xã Hồng Dương',
            'Huyện Thường Tín' => 'Thị trấn Thường Tín,Xã Ninh Sở,Xã Nhị Khê,Xã Duyên Thái,Xã Khánh Hà,Xã Hòa Bình,Xã Văn Bình,Xã Hiền Giang,Xã Hồng Vân,Xã Vân Tảo,Xã Liên Phương,Xã Văn Phú,Xã Tự Nhiên,Xã Tiền Phong,Xã Hà Hồi,Xã Thư Phú,Xã Nguyễn Trãi,Xã Quất Động,Xã Chương Dương,Xã Tân Minh,Xã Lê Lợi,Xã Thắng Lợi,Xã Dũng Tiến,Xã Thống Nhất,Xã Nghiêm Xuyên,Xã Tô Hiệu,Xã Văn Tự,Xã Vạn Điểm,Xã Minh Cường',
            'Huyện Phú Xuyên' => 'Thị trấn Phú Minh,Thị trấn Phú Xuyên,Xã Hồng Minh,Xã Phượng Dực,Xã Nam Tiến,Xã Tri Trung,Xã Đại Thắng,Xã Phú Túc,Xã Văn Hoàng,Xã Hồng Thái,Xã Hoàng Long,Xã Quang Trung,Xã Nam Phong,Xã Nam Triều,Xã Tân Dân,Xã Sơn Hà,Xã Chuyên Mỹ,Xã Khai Thái,Xã Phúc Tiến,Xã Vân Từ,Xã Tri Thủy,Xã Đại Xuyên,Xã Phú Yên,Xã Bạch Hạ,Xã Quang Lãng,Xã Châu Can,Xã Minh Tân',
            'Huyện ứng Hòa' => 'Thị trấn Vân Đình,Xã Viên An,Xã Viên Nội,Xã Hoa Sơn,Xã Quảng Phú Cầu,Xã Trường Thịnh,Xã Cao Thành,Xã Liên Bạt,Xã Sơn Công,Xã Đồng Tiến,Xã Phương Tú,Xã Trung Tú,Xã Đồng Tân,Xã Tảo Dương Văn,Xã Vạn Thái,Xã Minh Đức,Xã Hòa Lâm,Xã Hòa Xá,Xã Trầm Lộng,Xã Kim Đường,Xã Hòa Nam,Xã Hòa Phú,Xã Đội Bình,Xã Đại Hùng,Xã Đông Lỗ,Xã Phù Lưu,Xã Đại Cường,Xã Lưu Hoàng,Xã Hồng Quang',
            'Huyện Mỹ Đức' => 'Thị trấn Đại Nghĩa,Xã Đồng Tâm,Xã Thượng Lâm,Xã Tuy Lai,Xã Phúc Lâm,Xã Mỹ Thành,Xã Bột Xuyên,Xã An Mỹ,Xã Hồng Sơn,Xã Lê Thanh,Xã Xuy Xá,Xã Phùng Xá,Xã Phù Lưu Tế,Xã Đại Hưng,Xã Vạn Kim,Xã Đốc Tín,Xã Hương Sơn,Xã Hùng Tiến,Xã An Tiến,Xã Hợp Tiến,Xã Hợp Thanh,Xã An Phú',
        ],
        'Tỉnh Hà Giang' => [
            'Thành phố Hà Giang' => 'Phường Quang Trung,Phường Trần Phú,Phường Ngọc Hà,Phường Nguyễn Trãi,Phường Minh Khai,Xã Ngọc Đường,Xã Phương Độ,Xã Phương Thiện',
            'Huyện Đồng Văn' => 'Thị trấn Phó Bảng,Xã Lũng Cú,Xã Má Lé,Thị trấn Đồng Văn,Xã Lũng Táo,Xã Phố Là,Xã Thài Phìn Tủng,Xã Sủng Là,Xã Xà Phìn,Xã Tả Phìn,Xã Tả Lủng,Xã Phố Cáo,Xã Sính Lủng,Xã Sảng Tủng,Xã Lũng Thầu,Xã Hố Quáng Phìn,Xã Vần Chải,Xã Lũng Phìn,Xã Sủng Trái',
            'Huyện Mèo Vạc' => 'Thị trấn Mèo Vạc,Xã Thượng Phùng,Xã Pải Lủng,Xã Xín Cái,Xã Pả Vi,Xã Giàng Chu Phìn,Xã Sủng Trà,Xã Sủng Máng,Xã Sơn Vĩ,Xã Tả Lủng,Xã Cán Chu Phìn,Xã Lũng Pù,Xã Lũng Chinh,Xã Tát Ngà,Xã Nậm Ban,Xã Khâu Vai,Xã Niêm Tòng,Xã Niêm Sơn',
            'Huyện Yên Minh' => 'Thị trấn Yên Minh,Xã Thắng Mố,Xã Phú Lũng,Xã Sủng Tráng,Xã Bạch Đích,Xã Na Khê,Xã Sủng Thài,Xã Hữu Vinh,Xã Lao Và Chải,Xã Mậu Duệ,Xã Đông Minh,Xã Mậu Long,Xã Ngam La,Xã Ngọc Long,Xã Đường Thượng,Xã Lũng Hồ,Xã Du Tiến,Xã Du Già',
            'Huyện Quản Bạ' => 'Thị trấn Tam Sơn,Xã Bát Đại Sơn,Xã Nghĩa Thuận,Xã Cán Tỷ,Xã Cao Mã Pờ,Xã Thanh Vân,Xã Tùng Vài,Xã Đông Hà,Xã Quản Bạ,Xã Lùng Tám,Xã Quyết Tiến,Xã Tả Ván,Xã Thái An',
            'Huyện Vị Xuyên' => 'Xã Kim Thạch,Xã Phú Linh,Xã Kim Linh,Thị trấn Vị Xuyên,Thị trấn Nông Trường Việt Lâm,Xã Minh Tân,Xã Thuận Hoà,Xã Tùng Bá,Xã Thanh Thủy,Xã Thanh Đức,Xã Phong Quang,Xã Xín Chải,Xã Phương Tiến,Xã Lao Chải,Xã Cao Bồ,Xã Đạo Đức,Xã Thượng Sơn,Xã Linh Hồ,Xã Quảng Ngần,Xã Việt Lâm,Xã Ngọc Linh,Xã Ngọc Minh,Xã Bạch Ngọc,Xã Trung Thành',
            'Huyện Bắc Mê' => 'Xã Minh Sơn,Xã Minh Sơn,Xã Giáp Trung,Xã Yên Định,Thị trấn Yên Phú,Xã Minh Ngọc,Xã Yên Phong,Xã Lạc Nông,Xã Phú Nam,Xã Yên Cường,Xã Thượng Tân,Xã Đường Âm,Xã Đường Hồng,Xã Phiêng Luông',
            'Huyện Hoàng Su Phì' => 'Thị trấn Vinh Quang,Xã Bản Máy,Xã Thàng Tín,Xã Thèn Chu Phìn,Xã Pố Lồ,Xã Bản Phùng,Xã Túng Sán,Xã Chiến Phố,Xã Đản Ván,Xã Tụ Nhân,Xã Tân Tiến,Xã Nàng Đôn,Xã Pờ Ly Ngài,Xã Sán Xả Hồ,Xã Bản Luốc,Xã Ngàm Đăng Vài,Xã Bản Nhùng,Xã Tả Sử Choóng,Xã Nậm Dịch,Xã Hồ Thầu,Xã Nam Sơn,Xã Nậm Tỵ,Xã Thông Nguyên,Xã Nậm Khòa',
            'Huyện Xín Mần' => 'Thị trấn Cốc Pài,Xã Nàn Xỉn,Xã Bản Díu,Xã Chí Cà,Xã Xín Mần,Xã Thèn Phàng,Xã Trung Thịnh,Xã Pà Vầy Sủ,Xã Cốc Rế,Xã Thu Tà,Xã Nàn Ma,Xã Tả Nhìu,Xã Bản Ngò,Xã Chế Là,Xã Nấm Dẩn,Xã Quảng Nguyên,Xã Nà Chì,Xã Khuôn Lùng',
            'Huyện Bắc Quan' => 'Thị trấn Việt Quang,Thị trấn Vĩnh Tuy,Xã Tân Lập,Xã Tân Thành,Xã Đồng Tiến,Xã Đồng Tâm,Xã Tân Quang,Xã Thượng Bình,Xã Hữu Sản,Xã Kim Ngọc,Xã Việt Vinh,Xã Bằng Hành,Xã Quang Minh,Xã Liên Hiệp,Xã Vô Điếm,Xã Việt Hồng,Xã Hùng An,Xã Đức Xuân,Xã Tiên Kiều,Xã Vĩnh Hảo,Xã Vĩnh Phúc,Xã Đồng Yên,Xã Đông Thành',
            'Huyện Quang Bình' => 'Xã Xuân Minh,Xã Tiên Nguyên,Xã Tân Nam,Xã Bản Rịa,Xã Yên Thành,Thị trấn Yên Bình,Xã Tân Trịnh,Xã Tân Bắc,Xã Bằng Lang,Xã Yên Hà,Xã Hương Sơn,Xã Xuân Giang,Xã Nà Khương,Xã Tiên Yên,Xã Vĩ Thượng',
        ],
        'Tỉnh Cao Bằng' => [
            'Thành phố Cao Bằng' => 'Phường Sông Hiến,Phường Sông Bằng,Phường Hợp Giang,Phường Tân Giang,Phường Ngọc Xuân,Phường Đề Thám,Phường Hoà Chung,Phường Duyệt Trung,Xã Vĩnh Quang,Xã Hưng Đạo,Xã Chu Trinh',
            'Huyện Bảo Lâm' => 'Thị trấn Pác Miầu,Xã Đức Hạnh,Xã Lý Bôn,Xã Nam Cao,Xã Nam Quang,Xã Vĩnh Quang,Xã Quảng Lâm,Xã Thạch Lâm,Xã Vĩnh Phong,Xã Mông Ân,Xã Thái Học,Xã Thái Sơn,Xã Yên Thổ',
            'Huyện Bảo Lạc' => 'Thị trấn Bảo Lạc,Xã Cốc Pàng,Xã Thượng Hà,Xã Cô Ba,Xã Bảo Toàn,Xã Khánh Xuân,Xã Xuân Trường,Xã Hồng Trị,Xã Kim Cúc,Xã Phan Thanh,Xã Hồng An,Xã Hưng Đạo,Xã Hưng Thịnh,Xã Huy Giáp,Xã Đình Phùng,Xã Sơn Lập,Xã Sơn Lộ',
            'Huyện Hà Quảng' => 'Thị trấn Thông Nông,Xã Cần Yên,Xã Cần Nông,Xã Lương Thông,Xã Đa Thông,Xã Ngọc Động,Xã Yên Sơn,Xã Lương Can,Xã Thanh Long,Thị trấn Xuân Hòa,Xã Lũng Nặm,Xã Trường Hà,Xã Cải Viên,Xã Nội Thôn,Xã Tổng Cọt,Xã Sóc Hà,Xã Thượng Thôn,Xã Hồng Sỹ,Xã Quý Quân,Xã Mã Ba,Xã Ngọc Đào',
            'Huyện Trùng Khánh' => 'Thị trấn Trà Lĩnh,Xã Tri Phương,Xã Quang Hán,Xã Xuân Nội,Xã Quang Trung,Xã Quang Vinh,Xã Cao Chương,Thị trấn Trùng Khánh,Xã Ngọc Khê,Xã Ngọc Côn,Xã Phong Nậm,Xã Đình Phong,Xã Đàm Thuỷ,Xã Khâm Thành,Xã Chí Viễn,Xã Lăng Hiếu,Xã Phong Châu,Xã Trung Phúc,Xã Cao Thăng,Xã Đức Hồng,Xã Đoài Dương',
            'Huyện Hạ Lang' => 'Xã Minh Long,Xã Lý Quốc,Xã Thắng Lợi,Xã Đồng Loan,Xã Đức Quang,Xã Kim Loan,Xã Quang Long,Xã An Lạc,Thị trấn Thanh Nhật,Xã Vinh Quý,Xã Thống Nhất,Xã Cô Ngân,Xã Thị Hoa',
            'Huyện Quảng Hòa' => 'Xã Quốc Toản,Thị trấn Quảng Uyên,Xã Phi Hải,Xã Quảng Hưng,Xã Độc Lập,Xã Cai Bộ,Xã Phúc Sen,Xã Chí Thảo,Xã Tự Do,Xã Hồng Quang,Xã Ngọc Động,Xã Hạnh Phúc,Thị trấn Tà Lùng,Xã Bế Văn Đàn,Xã Cách Linh,Xã Đại Sơn,Xã Tiên Thành,Thị trấn Hoà Thuận,Xã Mỹ Hưng',
            'Huyện Hòa An' => 'Thị trấn Nước Hai,Xã Dân Chủ,Xã Nam Tuấn,Xã Đại Tiến,Xã Đức Long,Xã Ngũ Lão,Xã Trương Lương,Xã Hồng Việt,Xã Hoàng Tung,Xã Nguyễn Huệ,Xã Quang Trung,Xã Bạch Đằng,Xã Bình Dương,Xã Lê Chung,Xã Hồng Nam',
            'Huyện Nguyên Bình' => 'Thị trấn Nguyên Bình,Thị trấn Tĩnh Túc,Xã Yên Lạc,Xã Triệu Nguyên,Xã Ca Thành,Xã Vũ Nông,Xã Minh Tâm,Xã Thể Dục,Xã Mai Long,Xã Vũ Minh,Xã Hoa Thám,Xã Phan Thanh,Xã Quang Thành,Xã Tam Kim,Xã Thành Công,Xã Thịnh Vượng,Xã Hưng Đạo',
            'Huyện Thạch An' => 'Thị trấn Đông Khê,Xã Canh Tân,Xã Kim Đồng,Xã Minh Khai,Xã Đức Thông,Xã Thái Cường,Xã Vân Trình,Xã Thụy Hùng,Xã Quang Trọng,Xã Trọng Con,Xã Lê Lai,Xã Đức Long,Xã Lê Lợi,Xã Đức Xuân',
        ],
        'Tỉnh Bắc Kạn' => [
            'Thành phố Bắc Kạn' => 'Phường Nguyễn Thị Minh Khai,Phường Sông Cầu,Phường Đức Xuân,Phường Phùng Chí Kiên,Phường Huyền Tụng,Xã Dương Quang,Xã Nông Thượng,Phường Xuất Hóa',
            'Huyện Pác Nặm' => 'Xã Bằng Thành,Xã Nhạn Môn,Xã Bộc Bố,Xã Công Bằng,Xã Giáo Hiệu,Xã Xuân La,Xã An Thắng,Xã Cổ Linh,Xã Nghiên Loan,Xã Cao Tân',
            'Huyện Ba Bể' => 'Thị trấn Chợ Rã,Xã Bành Trạch,Xã Phúc Lộc,Xã Hà Hiệu,Xã Cao Thượng,Xã Khang Ninh,Xã Nam Mẫu,Xã Thượng Giáo,Xã Địa Linh,Xã Yến Dương,Xã Chu Hương,Xã Quảng Khê,Xã Mỹ Phương,Xã Hoàng Trĩ,Xã Đồng Phúc',
            'Huyện Ngân Sơn' => 'Thị trấn Nà Phặc,Xã Thượng Ân,Xã Bằng Vân,Xã Cốc Đán,Xã Trung Hoà,Xã Đức Vân,Xã Vân Tùng,Xã Thượng Quan,Xã Hiệp Lực,Xã Thuần Mang',
            'Huyện Bạch Thông' => 'Thị trấn Phủ Thông,Xã Vi Hương,Xã Sĩ Bình,Xã Vũ Muộn,Xã Đôn Phong,Xã Lục Bình,Xã Tân Tú,Xã Nguyên Phúc,Xã Cao Sơn,Xã Quân Hà,Xã Cẩm Giàng,Xã Mỹ Thanh,Xã Dương Phong,Xã Quang Thuận',
            'Huyện Chợ Đồn' => 'Thị trấn Bằng Lũng,Xã Xuân Lạc,Xã Nam Cường,Xã Đồng Lạc,Xã Tân Lập,Xã Bản Thi,Xã Quảng Bạch,Xã Bằng Phúc,Xã Yên Thịnh,Xã Yên Thượng,Xã Phương Viên,Xã Ngọc Phái,Xã Đồng Thắng,Xã Lương Bằng,Xã Bằng Lãng,Xã Đại Sảo,Xã Nghĩa Tá,Xã Yên Mỹ,Xã Bình Trung,Xã Yên Phong',
            'Huyện Chợ Mới' => 'Thị trấn Đồng Tâm,Xã Tân Sơn,Xã Thanh Vận,Xã Mai Lạp,Xã Hoà Mục,Xã Thanh Mai,Xã Cao Kỳ,Xã Nông Hạ,Xã Yên Cư,Xã Thanh Thịnh,Xã Yên Hân,Xã Như Cố,Xã Bình Văn,Xã Quảng Chu',
            'Huyện Na Rì' => 'Xã Văn Vũ,Xã Văn Lang,Xã Lương Thượng,Xã Kim Hỷ,Xã Cường Lợi,Thị trấn Yến Lạc,Xã Kim Lư,Xã Sơn Thành,Xã Văn Minh,Xã Côn Minh,Xã Cư Lễ,Xã Trần Phú,Xã Quang Phong,Xã Dương Sơn,Xã Xuân Dương,Xã Đổng Xá,Xã Liêm Thuỷ',
        ],
        'Tỉnh Tuyên Quang' => [
            'Thành phố Tuyên Quang' => 'Phường Phan Thiết,Phường Minh Xuân,Phường Tân Quang,Xã Tràng Đà,Phường Nông Tiến,Phường Ỷ La,Phường Tân Hà,Phường Hưng Thành,Xã Kim Phú,Xã An Khang,Phường Mỹ Lâm,Phường An Tường,Xã Lưỡng Vượng,Xã Thái Long,Phường Đội Cấn',
            'Huyện Lâm Bình' => 'Xã Phúc Yên,Xã Xuân Lập,Xã Khuôn Hà,Thị trấn Lăng Can,Xã Thượng Lâm,Xã Bình An,Xã Hồng Quang,Xã Thổ Bình,Xã Phúc Sơn,Xã Minh Quang',
            'Huyện Na Hang' => 'Thị trấn Na Hang,Xã Sinh Long,Xã Thượng Giáp,Xã Thượng Nông,Xã Côn Lôn,Xã Yên Hoa,Xã Hồng Thái,Xã Đà Vị,Xã Khau Tinh,Xã Sơn Phú,Xã Năng Khả,Xã Thanh Tương',
            'Huyện Chiêm Hóa' => 'Thị trấn Vĩnh Lộc,Xã Trung Hà,Xã Tân Mỹ,Xã Hà Lang,Xã Hùng Mỹ,Xã Yên Lập,Xã Tân An,Xã Bình Phú,Xã Xuân Quang,Xã Ngọc Hội,Xã Phú Bình,Xã Hòa Phú,Xã Phúc Thịnh,Xã Kiên Đài,Xã Tân Thịnh,Xã Trung Hòa,Xã Kim Bình,Xã Hòa An,Xã Vinh Quang,Xã Tri Phú,Xã Nhân Lý,Xã Yên Nguyên,Xã Linh Phú,Xã Bình Nhân',
            'Huyện Hàm Yên' => 'Thị trấn Tân Yên,Xã Yên Thuận,Xã Bạch Xa,Xã Minh Khương,Xã Yên Lâm,Xã Minh Dân,Xã Phù Lưu,Xã Minh Hương,Xã Yên Phú,Xã Tân Thành,Xã Bình Xa,Xã Thái Sơn,Xã Nhân Mục,Xã Thành Long,Xã Bằng Cốc,Xã Thái Hòa,Xã Đức Ninh,Xã Hùng Đức',
            'Huyện Yên Sơn' => 'Xã Quí Quân,Xã Lực Hành,Xã Kiến Thiết,Xã Trung Minh,Xã Chiêu Yên,Xã Trung Trực,Xã Xuân Vân,Xã Phúc Ninh,Xã Hùng Lợi,Xã Trung Sơn,Xã Tân Tiến,Xã Tứ Quận,Xã Đạo Viện,Xã Tân Long,Thị trấn Yên Sơn,Xã Kim Quan,Xã Lang Quán,Xã Phú Thịnh,Xã Công Đa,Xã Trung Môn,Xã Chân Sơn,Xã Thái Bình,Xã Tiến Bộ,Xã Mỹ Bằng,Xã Hoàng Khai,Xã Nhữ Hán,Xã Nhữ Khê,Xã Đội Bình',
            'Huyện Sơn Dương' => 'Thị trấn Sơn Dương,Xã Trung Yên,Xã Minh Thanh,Xã Tân Trào,Xã Vĩnh Lợi,Xã Thượng Ấm,Xã Bình Yên,Xã Lương Thiện,Xã Tú Thịnh,Xã Cấp Tiến,Xã Hợp Thành,Xã Phúc Ứng,Xã Đông Thọ,Xã Kháng Nhật,Xã Hợp Hòa,Xã Quyết Thắng,Xã Đồng Quý,Xã Tân Thanh,Xã Vân Sơn,Xã Văn Phú,Xã Chi Thiết,Xã Đông Lợi,Xã Thiện Kế,Xã Hồng Lạc,Xã Phú Lương,Xã Ninh Lai,Xã Đại Phú,Xã Sơn Nam,Xã Hào Phú,Xã Tam Đa,Xã Trường Sinh',
        ],
        'Tỉnh Lào Cai' => [
            'Thành phố Lào Cai' => 'Phường Duyên Hải,Phường Lào Cai,Phường Cốc Lếu,Phường Kim Tân,Phường Bắc Lệnh,Phường Pom Hán,Phường Xuân Tăng,Phường Bình Minh,Xã Thống Nhất,Xã Đồng Tuyển,Xã Vạn Hoà,Phường Bắc Cường,Phường Nam Cường,Xã Cam Đường,Xã Tả Phời,Xã Hợp Thành,Xã Cốc San',
            'Huyện Bát Xát' => 'Thị trấn Bát Xát,Xã A Mú Sung,Xã Nậm Chạc,Xã A Lù,Xã Trịnh Tường,Xã Y Tý,Xã Cốc Mỳ,Xã Dền Sáng,Xã Bản Vược,Xã Sàng Ma Sáo,Xã Bản Qua,Xã Mường Vi,Xã Dền Thàng,Xã Bản Xèo,Xã Mường Hum,Xã Trung Lèng Hồ,Xã Quang Kim,Xã Pa Cheo,Xã Nậm Pung,Xã Phìn Ngan,Xã Tòng Sành',
            'Huyện Mường Khương' => 'Xã Pha Long,Xã Tả Ngải Chồ,Xã Tung Chung Phố,Thị trấn Mường Khương,Xã Dìn Chin,Xã Tả Gia Khâu,Xã Nậm Chảy,Xã Nấm Lư,Xã Lùng Khấu Nhin,Xã Thanh Bình,Xã Cao Sơn,Xã Lùng Vai,Xã Bản Lầu,Xã La Pan Tẩn,Xã Tả Thàng,Xã Bản Sen',
            'Huyện Si Ma Cai' => 'Xã Nàn Sán,Xã Thào Chư Phìn,Xã Bản Mế,Thị trấn Si Ma Cai,Xã Sán Chải,Xã Lùng Thẩn,Xã Cán Cấu,Xã Sín Chéng,Xã Quan Hồ Thẩn,Xã Nàn Xín',
            'Huyện Bắc Hà' => 'Thị trấn Bắc Hà,Xã Lùng Cải,Xã Lùng Phình,Xã Tả Van Chư,Xã Tả Củ Tỷ,Xã Thải Giàng Phố,Xã Hoàng Thu Phố,Xã Bản Phố,Xã Bản Liền,Xã Tà Chải,Xã Na Hối,Xã Cốc Ly,Xã Nậm Mòn,Xã Nậm Đét,Xã Nậm Khánh,Xã Bảo Nhai,Xã Nậm Lúc,Xã Cốc Lầu,Xã Bản Cái',
            'Huyện Bảo Thắng' => 'Thị trấn N.T Phong Hải,Thị trấn Phố Lu,Thị trấn Tằng Loỏng,Xã Bản Phiệt,Xã Bản Cầm,Xã Thái Niên,Xã Phong Niên,Xã Gia Phú,Xã Xuân Quang,Xã Sơn Hải,Xã Xuân Giao,Xã Trì Quang,Xã Sơn Hà,Xã Phú Nhuận',
            'Huyện Bảo Yên' => 'Thị trấn Phố Ràng,Xã Tân Tiến,Xã Nghĩa Đô,Xã Vĩnh Yên,Xã Điện Quan,Xã Xuân Hoà,Xã Tân Dương,Xã Thượng Hà,Xã Kim Sơn,Xã Cam Cọn,Xã Minh Tân,Xã Xuân Thượng,Xã Việt Tiến,Xã Yên Sơn,Xã Bảo Hà,Xã Lương Sơn,Xã Phúc Khánh',
            'Thị xã SaPa' => 'Phường Sa Pa,Phường Sa Pả,Phường Ô Quý Hồ,Xã Ngũ Chỉ Sơn,Phường Phan Si Păng,Xã Trung Chải,Xã Tả Phìn,Phường Hàm Rồng,Xã Hoàng Liên,Xã Thanh Bình,Phường Cầu Mây,Xã Mường Hoa,Xã Tả Van,Xã Mường Bo,Xã Bản Hồ,Xã Liên Minh',
            'Huyện Văn Bàn' => 'Thị trấn Khánh Yên,Xã Võ Lao,Xã Sơn Thuỷ,Xã Nậm Mả,Xã Tân Thượng,Xã Nậm Rạng,Xã Nậm Chầy,Xã Tân An,Xã Khánh Yên Thượng,Xã Nậm Xé,Xã Dần Thàng,Xã Chiềng Ken,Xã Làng Giàng,Xã Hoà Mạc,Xã Khánh Yên Trung,Xã Khánh Yên Hạ,Xã Dương Quỳ,Xã Nậm Tha,Xã Minh Lương,Xã Thẩm Dương,Xã Liêm Phú,Xã Nậm Xây',
        ],
        'Tỉnh Điện Biên' => [
            'Thành phố Điện Biên Phủ' => 'Phường Noong Bua,Phường Him Lam,Phường Thanh Bình,Phường Tân Thanh,Phường Mường Thanh,Phường Nam Thanh,Phường Thanh Trường,Xã Thanh Minh,Xã Nà Tấu,Xã Nà Nhạn,Xã Mường Phăng,Xã Pá Khoang',
            'Thị xã Mường Lay' => 'Phường Sông Đà,Phường Na Lay,Xã Lay Nưa',
            'Huyện Mường Nhé' => 'Xã Sín Thầu,Xã Sen Thượng,Xã Chung Chải,Xã Leng Su Sìn,Xã Pá Mỳ,Xã Mường Nhé,Xã Nậm Vì,Xã Nậm Kè,Xã Mường Toong,Xã Quảng Lâm,Xã Huổi Lếnh',
            'Huyện Mường Chà' => 'Thị Trấn Mường Chà,Xã Xá Tổng,Xã Mường Tùng,Xã Hừa Ngài,Xã Huổi Mí,Xã Pa Ham,Xã Nậm Nèn,Xã Huổi Lèng,Xã Sa Lông,Xã Ma Thì Hồ,Xã Na Sang,Xã Mường Mươn',
            'Huyện Tủa Chùa' => 'Thị trấn Tủa Chùa,Xã Huổi Só,Xã Xín Chải,Xã Tả Sìn Thàng,Xã Lao Xả Phình,Xã Tả Phìn,Xã Tủa Thàng,Xã Trung Thu,Xã Sính Phình,Xã Sáng Nhè,Xã Mường Đun,Xã Mường Báng',
            'Huyện Tuần Giáo' => 'Thị trấn Tuần Giáo,Xã Phình Sáng,Xã Rạng Đông,Xã Mùn Chung,Xã Nà Tòng,Xã Ta Ma,Xã Mường Mùn,Xã Pú Xi,Xã Pú Nhung,Xã Quài Nưa,Xã Mường Thín,Xã Tỏa Tình,Xã Nà Sáy,Xã Mường Khong,Xã Quài Cang,Xã Quài Tở,Xã Chiềng Sinh,Xã Chiềng Đông,Xã Tênh Phông',
            'Huyện Điện Biên' => 'Xã Mường Pồn,Xã Thanh Nưa,Xã Hua Thanh,Xã Thanh Luông,Xã Thanh Hưng,Xã Thanh Xương,Xã Thanh Chăn,Xã Pa Thơm,Xã Thanh An,Xã Thanh Yên,Xã Noong Luống,Xã Noọng Hẹt,Xã Sam Mứn,Xã Pom Lót,Xã Núa Ngam,Xã Hẹ Muông,Xã Na Ư,Xã Mường Nhà,Xã Na Tông,Xã Mường Lói,Xã Phu Luông',
            'Huyện Điện Biên Đông' => 'Thị trấn Điện Biên Đông,Xã Na Son,Xã Phì Nhừ,Xã Chiềng Sơ,Xã Mường Luân,Xã Pú Nhi,Xã Nong U,Xã Xa Dung,Xã Keo Lôm,Xã Luân Giới,Xã Phình Giàng,Xã Pú Hồng,Xã Tìa Dình,Xã Háng Lìa',
            'Huyện Mường Ảng' => 'Thị trấn Mường Ảng,Xã Mường Đăng,Xã Ngối Cáy,Xã Ẳng Tở,Xã Búng Lao,Xã Xuân Lao,Xã Ẳng Nưa,Xã Ẳng Cang,Xã Nặm Lịch,Xã Mường Lạn',
            'Huyện Nậm Pồ' => 'Xã Nậm Tin,Xã Pa Tần,Xã Chà Cang,Xã Na Cô Sa,Xã Nà Khoa,Xã Nà Hỳ,Xã Nà Bủng,Xã Nậm Nhừ,Xã Nậm Chua,Xã Nậm Khăn,Xã Chà Tở,Xã Vàng Đán,Xã Chà Nưa,Xã Phìn Hồ,Xã Si Pa Phìn',
        ],
        'Tỉnh Lai Châu' => [
            'Thành phố Lai Châu' => 'Phường Quyết Thắng,Phường Tân Phong,Phường Quyết Tiến,Phường Đoàn Kết,Xã Sùng Phài,Phường Đông Phong,Xã San Thàng',
            'Huyện Tam Đường' => 'Thị trấn Tam Đường,Xã Thèn Sin,Xã Tả Lèng,Xã Giang Ma,Xã Hồ Thầu,Xã Bình Lư,Xã Sơn Bình,Xã Nùng Nàng,Xã Bản Giang,Xã Bản Hon,Xã Bản Bo,Xã Nà Tăm,Xã Khun Há',
            'Huyện Mường Tè' => 'Thị trấn Mường Tè,Xã Thu Lũm,Xã Ka Lăng,Xã Tá Bạ,Xã Pa ủ,Xã Mường Tè,Xã Pa Vệ Sử,Xã Mù Cả,Xã Bum Tở,Xã Nậm Khao,Xã Tà Tổng,Xã Bum Nưa,Xã Vàng San,Xã Kan Hồ',
            'Huyện Sìn Hồ' => 'Thị trấn Sìn Hồ,Xã Chăn Nưa,Xã Pa Tần,Xã Phìn Hồ,Xã Hồng Thu,Xã Phăng Sô Lin,Xã Ma Quai,Xã Lùng Thàng,Xã Tả Phìn,Xã Sà Dề Phìn,Xã Nậm Tăm,Xã Tả Ngảo,Xã Pu Sam Cáp,Xã Nậm Cha,Xã Pa Khoá,Xã Làng Mô,Xã Noong Hẻo,Xã Nậm Mạ,Xã Căn Co,Xã Tủa Sín Chải,Xã Nậm Cuổi,Xã Nậm Hăn',
            'Huyện Phong Thổ' => 'Xã Lả Nhì Thàng,Xã Huổi Luông,Thị trấn Phong Thổ,Xã Sì Lở Lầu,Xã Mồ Sì San,Xã Pa Vây Sử,Xã Vàng Ma Chải,Xã Tông Qua Lìn,Xã Mù Sang,Xã Dào San,Xã Ma Ly Pho,Xã Bản Lang,Xã Hoang Thèn,Xã Khổng Lào,Xã Nậm Xe,Xã Mường So,Xã Sin Suối Hồ',
            'Huyện Than Uyên' => 'Thị trấn Than Uyên,Xã Phúc Than,Xã Mường Than,Xã Mường Mít,Xã Pha Mu,Xã Mường Cang,Xã Hua Nà,Xã Tà Hừa,Xã Mường Kim,Xã Tà Mung,Xã Tà Gia,Xã Khoen On',
            'Huyện Tân Uyên' => 'Thị trấn Tân Uyên,Xã Mường Khoa,Xã Phúc Khoa,Xã Thân Thuộc,Xã Trung Đồng,Xã Hố Mít,Xã Nậm Cần,Xã Nậm Sỏ,Xã Pắc Ta,Xã Tà Mít',
            'Huyện Nậm Nhìn' => 'Thị trấn Nậm Nhùn,Xã Hua Bun,Xã Mường Mô,Xã Nậm Chà,Xã Nậm Manh,Xã Nậm Hàng,Xã Lê Lợi,Xã Pú Đao,Xã Nậm Pì,Xã Nậm Ban,Xã Trung Chải',
        ],
        'Tỉnh Sơn La' => [
            'Thành phố Sơn La' => 'Phường Chiềng Lề,Phường Tô Hiệu,Phường Quyết Thắng,Phường Quyết Tâm,Xã Chiềng Cọ,Xã Chiềng Đen,Xã Chiềng Xôm,Phường Chiềng An,Phường Chiềng Cơi,Xã Chiềng Ngần,Xã Hua La,Phường Chiềng Sinh',
            'Huyện Quỳnh Nhai' => 'Xã Mường Chiên,Xã Cà Nàng,Xã Chiềng Khay,Xã Mường Giôn,Xã Pá Ma Pha Khinh,Xã Chiềng Ơn,Xã Mường Giàng,Xã Chiềng Bằng,Xã Mường Sại,Xã Nậm ét,Xã Chiềng Khoang',
            'Huyện Thuận Châu' => 'Thị trấn Thuận Châu,Xã Mường é,Xã Chiềng Pha,Xã Chiềng La,Xã Chiềng Ngàm,Xã Liệp Tè,Xã é Tòng,Xã Phổng Lập,Xã Phổng Lăng,Xã Chiềng Ly,Xã Noong Lay,Xã Mường Khiêng,Xã Mường Bám,Xã Long Hẹ,Xã Phổng Lái,Xã Chiềng Bôm,Xã Thôm Mòn,Xã Tông Lạnh,Xã Tông Cọ,Xã Bó Mười,Xã Co Mạ,Xã Púng Tra,Xã Chiềng Pấc,Xã Nậm Lầu,Xã Bon Phặng,Xã Co Tòng,Xã Muổi Nọi,Xã Pá Lông,Xã Bản Lầm',
            'Huyện Mường La' => 'Thị trấn Ít Ong,Xã Nậm Giôn,Xã Chiềng Lao,Xã Hua Trai,Xã Ngọc Chiến,Xã Mường Trai,Xã Nậm Păm,Xã Chiềng Muôn,Xã Chiềng Ân,Xã Pi Toong,Xã Chiềng Công,Xã Tạ Bú,Xã Chiềng San,Xã Mường Bú,Xã Chiềng Hoa,Xã Mường Chùm',
            'Huyện Bắc Yên' => 'Thị trấn Bắc Yên,Xã Phiêng Ban,Xã Hang Chú,Xã Xím Vàng,Xã Tà Xùa,Xã Háng Đồng,Xã Pắc Ngà,Xã Làng Chếu,Xã Chim Vàn,Xã Mường Khoa,Xã Song Pe,Xã Hồng Ngài,Xã Tạ Khoa,Xã Hua Nhàn,Xã Phiêng Côn,Xã Chiềng Sại',
            'Huyện Phù Yên' => 'Thị trấn Phù Yên,Xã Suối Tọ,Xã Mường Thải,Xã Mường Cơi,Xã Quang Huy,Xã Huy Bắc,Xã Huy Thượng,Xã Tân Lang,Xã Gia Phù,Xã Tường Phù,Xã Huy Hạ,Xã Huy Tân,Xã Mường Lang,Xã Suối Bau,Xã Huy Tường,Xã Mường Do,Xã Sập Xa,Xã Tường Thượng,Xã Tường Tiến,Xã Tường Phong,Xã Tường Hạ,Xã Kim Bon,Xã Mường Bang,Xã Đá Đỏ,Xã Tân Phong,Xã Nam Phong,Xã Bắc Phong',
            'Huyện Mộc Châu' => 'Thị trấn Mộc Châu,Thị trấn NT Mộc Châu,Xã Chiềng Sơn,Xã Tân Hợp,Xã Qui Hướng,Xã Tân Lập,Xã Nà Mường,Xã Tà Lai,Xã Chiềng Hắc,Xã Hua Păng,Xã Chiềng Khừa,Xã Mường Sang,Xã Đông Sang,Xã Phiêng Luông,Xã Lóng Sập',
            'Huyện Yên Châu' => 'Thị trấn Yên Châu,Xã Chiềng Đông,Xã Sập Vạt,Xã Chiềng Sàng,Xã Chiềng Pằn,Xã Viêng Lán,Xã Chiềng Hặc,Xã Mường Lựm,Xã Chiềng On,Xã Yên Sơn,Xã Chiềng Khoi,Xã Tú Nang,Xã Lóng Phiêng,Xã Phiêng Khoài,Xã Chiềng Tương',
            'Huyện Mai Sơn' => 'Thị trấn Hát Lót,Xã Chiềng Sung,Xã Mường Bằng,Xã Chiềng Chăn,Xã Mương Chanh,Xã Chiềng Ban,Xã Chiềng Mung,Xã Mường Bon,Xã Chiềng Chung,Xã Chiềng Mai,Xã Hát Lót,Xã Nà Pó,Xã Cò  Nòi,Xã Chiềng Nơi,Xã Phiêng Cằm,Xã Chiềng Dong,Xã Chiềng Kheo,Xã Chiềng Ve,Xã Chiềng Lương,Xã Phiêng Pằn,Xã Nà Ơt,Xã Tà Hộc',
            'Huyện Sông Mã' => 'Thị trấn Sông Mã,Xã Bó Sinh,Xã Pú Pẩu,Xã Chiềng Phung,Xã Chiềng En,Xã Mường Lầm,Xã Nậm Ty,Xã Đứa Mòn,Xã Yên Hưng,Xã Chiềng Sơ,Xã Nà Nghịu,Xã Nậm Mằn,Xã Chiềng Khoong,Xã Chiềng Cang,Xã Huổi Một,Xã Mường Sai,Xã Mường Cai,Xã Mường Hung,Xã Chiềng Khương',
            'Huyện Sốp Cộp' => 'Xã Sam Kha,Xã Púng Bánh,Xã Sốp Cộp,Xã Dồm Cang,Xã Nậm Lạnh,Xã Mường Lèo,Xã Mường Và,Xã Mường Lạn',
            'Huyện Vân Hồ' => 'Xã Suối Bàng,Xã Song Khủa,Xã Liên Hoà,Xã Tô Múa,Xã Mường Tè,Xã Chiềng Khoa,Xã Mường Men,Xã Quang Minh,Xã Vân Hồ,Xã Lóng Luông,Xã Chiềng Yên,Xã Chiềng Xuân,Xã Xuân Nha,Xã Tân Xuân',
        ],
        'Tỉnh Yên Bái' => [
            'Thành phố Yên Bái' => 'Phường Yên Thịnh,Phường Yên Ninh,Phường Minh Tân,Phường Nguyễn Thái Học,Phường Đồng Tâm,Phường Nguyễn Phúc,Phường Hồng Hà,Xã Minh Bảo,Phường Nam Cường,Xã Tuy Lộc,Xã Tân Thịnh,Xã Âu Lâu,Xã Giới Phiên,Phường Hợp Minh,Xã Văn Phú',
            'Thị xã Nghĩa Lộ' => 'Phường Pú Trạng,Phường Trung Tâm,Phường Tân An,Phường Cầu Thia,Xã Nghĩa Lợi,Xã Nghĩa Phúc,Xã Nghĩa An,Xã Nghĩa Lộ,Xã Sơn A,Xã Phù Nham,Xã Thanh Lương,Xã Hạnh Sơn,Xã Phúc Sơn,Xã Thạch Lương',
            'Huyện Lục Yên' => 'Thị trấn Yên Thế,Xã Tân Phượng,Xã Lâm Thượng,Xã Khánh Thiện,Xã Minh Chuẩn,Xã Mai Sơn,Xã Khai Trung,Xã Mường Lai,Xã An Lạc,Xã Minh Xuân,Xã Tô Mậu,Xã Tân Lĩnh,Xã Yên Thắng,Xã Khánh Hoà,Xã Vĩnh Lạc,Xã Liễu Đô,Xã Động Quan,Xã Tân Lập,Xã Minh Tiến,Xã Trúc Lâu,Xã Phúc Lợi,Xã Phan Thanh,Xã An Phú,Xã Trung Tâm',
            'Huyện Văn Yên' => 'Thị trấn Mậu A,Xã Lang Thíp,Xã Lâm Giang,Xã Châu Quế Thượng,Xã Châu Quế Hạ,Xã An Bình,Xã Quang Minh,Xã Đông An,Xã Đông Cuông,Xã Phong Dụ Hạ,Xã Mậu Đông,Xã Ngòi A,Xã Xuân Tầm,Xã Tân Hợp,Xã An Thịnh,Xã Yên Thái,Xã Phong Dụ Thượng,Xã Yên Hợp,Xã Đại Sơn,Xã Đại Phác,Xã Yên Phú,Xã Xuân Ái,Xã Viễn Sơn,Xã Mỏ Vàng,Xã Nà Hẩu',
            'Huyện Mù Căng Chải' => 'Thị trấn Mù Căng Chải,Xã Hồ Bốn,Xã Nậm Có,Xã Khao Mang,Xã Mồ Dề,Xã Chế Cu Nha,Xã Lao Chải,Xã Kim Nọi,Xã Cao Phạ,Xã La Pán Tẩn,Xã Dế Su Phình,Xã Chế Tạo,Xã Púng Luông,Xã Nậm Khắt',
            'Huyện Trấn Yên' => 'Thị trấn Cổ Phúc,Xã Tân Đồng,Xã Báo Đáp,Xã Đào Thịnh,Xã Việt Thành,Xã Hòa Cuông,Xã Minh Quán,Xã Quy Mông,Xã Cường Thịnh,Xã Kiên Thành,Xã Nga Quán,Xã Y Can,Xã Lương Thịnh,Xã Bảo Hưng,Xã Việt Cường,Xã Minh Quân,Xã Hồng Ca,Xã Hưng Thịnh,Xã Hưng Khánh,Xã Việt Hồng,Xã Vân Hội',
            'Huyện Trạm Tấu' => 'Thị trấn Trạm Tấu,Xã Túc Đán,Xã Pá Lau,Xã Xà Hồ,Xã Phình Hồ,Xã Trạm Tấu,Xã Tà Si Láng,Xã Pá Hu,Xã Làng Nhì,Xã Bản Công,Xã Bản Mù,Xã Hát Lìu',
            'Huyện Văn Chấn' => 'Thị trấn NT Liên Sơn,Thị trấn NT Trần Phú,Xã Tú Lệ,Xã Nậm Búng,Xã Gia Hội,Xã Sùng Đô,Xã Nậm Mười,Xã An Lương,Xã Nậm Lành,Xã Sơn Lương,Xã Suối Quyền,Xã Suối Giàng,Xã Nghĩa Sơn,Xã Suối Bu,Thị trấn Sơn Thịnh,Xã Đại Lịch,Xã Đồng Khê,Xã Cát Thịnh,Xã Tân Thịnh,Xã Chấn Thịnh,Xã Bình Thuận,Xã Thượng Bằng La,Xã Minh An,Xã Nghĩa Tâm',
            'Huyện Yên Bình' => 'Thị trấn Yên Bình,Thị trấn Thác Bà,Xã Xuân Long,Xã Cảm Nhân,Xã Ngọc Chấn,Xã Tân Nguyên,Xã Phúc Ninh,Xã Bảo Ái,Xã Mỹ Gia,Xã Xuân Lai,Xã Mông Sơn,Xã Cảm Ân,Xã Yên Thành,Xã Tân Hương,Xã Phúc An,Xã Bạch Hà,Xã Vũ Linh,Xã Đại Đồng,Xã Vĩnh Kiên,Xã Yên Bình,Xã Thịnh Hưng,Xã Hán Đà,Xã Phú Thịnh,Xã Đại Minh',
        ],
        'Tỉnh Hòa Bình' => [
            'Thành phố Hòa Bình' => 'Phường Thái Bình,Phường Tân Hòa,Phường Thịnh Lang,Phường Hữu Nghị,Phường Tân Thịnh,Phường Đồng Tiến,Phường Phương Lâm,Xã Yên Mông,Phường Quỳnh Lâm,Phường Dân Chủ,Xã Hòa Bình,Phường Thống Nhất,Phường Kỳ Sơn,Xã Thịnh Minh,Xã Hợp Thành,Xã Quang Tiến,Xã Mông Hóa,Phường Trung Minh,Xã Độc Lập',
            'Huyện Đà Bắc' => 'Thị trấn Đà Bắc,Xã Nánh Nghê,Xã Giáp Đắt,Xã Mường Chiềng,Xã Tân Pheo,Xã Đồng Chum,Xã Tân Minh,Xã Đoàn Kết,Xã Đồng Ruộng,Xã Tú Lý,Xã Trung Thành,Xã Yên Hòa,Xã Cao Sơn,Xã Toàn Sơn,Xã Hiền Lương,Xã Tiền Phong,Xã Vầy Nưa',
            'Huyện Lương Sơn' => 'Thị trấn Lương Sơn,Xã Lâm Sơn,Xã Hòa Sơn,Xã Tân Vinh,Xã Nhuận Trạch,Xã Cao Sơn,Xã Cư Yên,Xã Liên Sơn,Xã Cao Dương,Xã Thanh Sơn,Xã Thanh Cao',
            'Huyện Kim Bôi' => 'Thị trấn Bo,Xã Đú Sáng,Xã Hùng Sơn,Xã Bình Sơn,Xã Tú Sơn,Xã Vĩnh Tiến,Xã Đông Bắc,Xã Xuân Thủy,Xã Vĩnh Đồng,Xã Kim Lập,Xã Hợp Tiến,Xã Kim Bôi,Xã Nam Thượng,Xã Cuối Hạ,Xã Sào Báy,Xã Mi Hòa,Xã Nuông Dăm',
            'Huyện Cao Phong' => 'Thị trấn Cao Phong,Xã Bình Thanh,Xã Thung Nai,Xã Bắc Phong,Xã Thu Phong,Xã Hợp Phong,Xã Tây Phong,Xã Dũng Phong,Xã Nam Phong,Xã Thạch Yên',
            'Huyện Tân Lạc' => 'Thị trấn Mãn Đức,Xã Suối Hoa,Xã Phú Vinh,Xã Phú Cường,Xã Mỹ Hòa,Xã Quyết Chiến,Xã Phong Phú,Xã Tử Nê,Xã Thanh Hối,Xã Ngọc Mỹ,Xã Đông Lai,Xã Vân Sơn,Xã Nhân Mỹ,Xã Lỗ Sơn,Xã Ngổ Luông,Xã Gia Mô',
            'Huyện Mai Châu' => 'Xã Tân Thành,Thị trấn Mai Châu,Xã Sơn Thủy,Xã Pà Cò,Xã Hang Kia,Xã Đồng Tân,Xã Cun Pheo,Xã Bao La,Xã Tòng Đậu,Xã Nà Phòn,Xã Săm Khóe,Xã Chiềng Châu,Xã Mai Hạ,Xã Thành Sơn,Xã Mai Hịch,Xã Vạn Mai',
            'Huyện Lạc Sơn' => 'Thị trấn Vụ Bản,Xã Quý Hòa,Xã Miền Đồi,Xã Mỹ Thành,Xã Tuân Đạo,Xã Văn Nghĩa,Xã Văn Sơn,Xã Tân Lập,Xã Nhân Nghĩa,Xã Thượng Cốc,Xã Quyết Thắng,Xã Xuất Hóa,Xã Yên Phú,Xã Bình Hẻm,Xã Định Cư,Xã Chí Đạo,Xã Ngọc Sơn,Xã Hương Nhượng,Xã Vũ Bình,Xã Tự Do,Xã Yên Nghiệp,Xã Tân Mỹ,Xã Ân Nghĩa,Xã Ngọc Lâu',
            'Huyện Yên Thủy' => 'Thị trấn Hàng Trạm,Xã Lạc Sỹ,Xã Lạc Lương,Xã Bảo Hiệu,Xã Đa Phúc,Xã Hữu Lợi,Xã Lạc Thịnh,Xã Đoàn Kết,Xã Phú Lai,Xã Yên Trị,Xã Ngọc Lương',
            'Huyện Lạc Thủy' => 'Thị trấn Ba Hàng Đồi,Thị trấn Chi Nê,Xã Phú Nghĩa,Xã Phú Thành,Xã Hưng Thi,Xã Khoan Dụ,Xã Đồng Tâm,Xã Yên Bồng,Xã Thống Nhất,Xã An Bình',
        ],
        'Tỉnh Thái Nguyên' => [
            'Thành phố Thái Nguyên' => 'Phường Quán Triều,Phường Quang Vinh,Phường Túc Duyên,Phường Hoàng Văn Thụ,Phường Trưng Vương,Phường Quang Trung,Phường Phan Đình Phùng,Phường Tân Thịnh,Phường Thịnh Đán,Phường Đồng Quang,Phường Gia Sàng,Phường Tân Lập,Phường Cam Giá,Phường Phú Xá,Phường Hương Sơn,Phường Trung Thành,Phường Tân Thành,Phường Tân Long,Xã Phúc Hà,Xã Phúc Xuân,Xã Quyết Thắng,Xã Phúc Trìu,Xã Thịnh Đức,Phường Tích Lương,Xã Tân Cương,Xã Sơn Cẩm,Phường Chùa Hang,Xã Cao Ngạn,Xã Linh Sơn,Phường Đồng Bẩm,Xã Huống Thượng,Xã Đồng Liên',
            'Thành phố Sông Công' => 'Phường Lương Sơn,Phường Châu Sơn,Phường Mỏ Chè,Phường Cải Đan,Phường Thắng Lợi,Phường Phố Cò,Xã Tân Quang,Phường Bách Quang,Xã Bình Sơn,Xã Bá Xuyên',
            'Huyện Định Hóa' => 'Thị trấn Chợ Chu,Xã Linh Thông,Xã Lam Vỹ,Xã Quy Kỳ,Xã Tân Thịnh,Xã Kim Phượng,Xã Bảo Linh,Xã Phúc Chu,Xã Tân Dương,Xã Phượng Tiến,Xã Bảo Cường,Xã Đồng Thịnh,Xã Định Biên,Xã Thanh Định,Xã Trung Hội,Xã Trung Lương,Xã Bình Yên,Xã Điềm Mặc,Xã Phú Tiến,Xã Bộc Nhiêu,Xã Sơn Phú,Xã Phú Đình,Xã Bình Thành',
            'Huyện Phú Lương' => 'Thị trấn Giang Tiên,Thị trấn Đu,Xã Yên Ninh,Xã Yên Trạch,Xã Yên Đổ,Xã Yên Lạc,Xã Ôn Lương,Xã Động Đạt,Xã Phủ Lý,Xã Phú Đô,Xã Hợp Thành,Xã Tức Tranh,Xã Phấn Mễ,Xã Vô Tranh,Xã Cổ Lũng',
            'Huyện Đồng Hỷ' => 'Thị trấn Sông Cầu,Thị trấn Trại Cau,Xã Văn Lăng,Xã Tân Long,Xã Hòa Bình,Xã Quang Sơn,Xã Minh Lập,Xã Văn Hán,Xã Hóa Trung,Xã Khe Mo,Xã Cây Thị,Xã Hóa Thượng,Xã Hợp Tiến,Xã Tân Lợi,Xã Nam Hòa',
            'Huyện Võ Nhai' => 'Thị trấn Đình Cả,Xã Sảng Mộc,Xã Nghinh Tường,Xã Thần Xa,Xã Vũ Chấn,Xã Thượng Nung,Xã Phú Thượng,Xã Cúc Đường,Xã La Hiên,Xã Lâu Thượng,Xã Tràng Xá,Xã Phương Giao,Xã Liên Minh,Xã Dân Tiến,Xã Bình Long',
            'Huyện Đại Từ' => 'Thị trấn Hùng Sơn,Thị trấn Quân Chu,Xã Phúc Lương,Xã Minh Tiến,Xã Yên Lãng,Xã Đức Lương,Xã Phú Cường,Xã Na Mao,Xã Phú Lạc,Xã Tân Linh,Xã Phú Thịnh,Xã Phục Linh,Xã Phú Xuyên,Xã Bản Ngoại,Xã Tiên Hội,Xã Cù Vân,Xã Hà Thượng,Xã La Bằng,Xã Hoàng Nông,Xã Khôi Kỳ,Xã An Khánh,Xã Tân Thái,Xã Bình Thuận,Xã Lục Ba,Xã Mỹ Yên,Xã Vạn Thọ,Xã Văn Yên,Xã Ký Phú,Xã Cát Nê,Xã Quân Chu',
            'Thị xã Phổ Yên' => 'Phường Bãi Bông,Phường Bắc Sơn,Phường Ba Hàng,Xã Phúc Tân,Xã Phúc Thuận,Xã Hồng Tiến,Xã Minh Đức,Xã Đắc Sơn,Phường Đồng Tiến,Xã Thành Công,Xã Tiên Phong,Xã Vạn Phái,Xã Nam Tiến,Xã Tân Hương,Xã Đông Cao,Xã Trung Thành,Xã Tân Phú,Xã Thuận Thành',
            'Huyện Phú Bình' => 'Thị trấn Hương Sơn,Xã Bàn Đạt,Xã Tân Khánh,Xã Tân Kim,Xã Tân Thành,Xã Đào Xá,Xã Bảo Lý,Xã Thượng Đình,Xã Tân Hòa,Xã Nhã Lộng,Xã Điềm Thụy,Xã Xuân Phương,Xã Tân Đức,Xã Úc Kỳ,Xã Lương Phú,Xã Nga My,Xã Kha Sơn,Xã Thanh Ninh,Xã Dương Thành,Xã Hà Châu',
        ],
        'Tỉnh Lạng Sơn' => [
            'Thành phố Lạng Sơn' => 'Phường Hoàng Văn Thụ,Phường Tam Thanh,Phường Vĩnh Trại,Phường Đông Kinh,Phường Chi Lăng,Xã Hoàng Đồng,Xã Quảng Lạc,Xã Mai Pha',
            'Huyện Tràng Định' => 'Thị trấn Thất Khê,Xã Khánh Long,Xã Đoàn Kết,Xã Quốc Khánh,Xã Vĩnh Tiến,Xã Cao Minh,Xã Chí Minh,Xã Tri Phương,Xã Tân Tiến,Xã Tân Yên,Xã Đội Cấn,Xã Tân Minh,Xã Kim Đồng,Xã Chi Lăng,Xã Trung Thành,Xã Đại Đồng,Xã Đào Viên,Xã Đề Thám,Xã Kháng Chiến,Xã Hùng Sơn,Xã Quốc Việt,Xã Hùng Việt',
            'Huyện Bình Gia' => 'Xã Hưng Đạo,Xã Vĩnh Yên,Xã Hoa Thám,Xã Quý Hòa,Xã Hồng Phong,Xã Yên Lỗ,Xã Thiện Hòa,Xã Quang Trung,Xã Thiện Thuật,Xã Minh Khai,Xã Thiện Long,Xã Hoàng Văn Thụ,Xã Hòa Bình,Xã Mông Ân,Xã Tân Hòa,Thị trấn Bình Gia,Xã Hồng Thái,Xã Bình La,Xã Tân Văn',
            'Huyện Văn Lãng' => 'Thị trấn Na Sầm,Xã Trùng Khánh,Xã Bắc La,Xã Thụy Hùng,Xã Bắc Hùng,Xã Tân Tác,Xã Thanh Long,Xã Hội Hoan,Xã Bắc Việt,Xã Hoàng Việt,Xã Gia Miễn,Xã Thành Hòa,Xã Tân Thanh,Xã Tân Mỹ,Xã Hồng Thái,Xã  Hoàng Văn Thụ,Xã Nhạc Kỳ',
            'Huyện Cao Lộc' => 'Thị trấn Đồng Đăng,Thị trấn Cao Lộc,Xã Bảo Lâm,Xã Thanh Lòa,Xã Cao Lâu,Xã Thạch Đạn,Xã Xuất Lễ,Xã Hồng Phong,Xã Thụy Hùng,Xã Lộc Yên,Xã Phú Xá,Xã Bình Trung,Xã Hải Yến,Xã Hòa Cư,Xã Hợp Thành,Xã Công Sơn,Xã Gia Cát,Xã Mẫu Sơn,Xã Xuân Long,Xã Tân Liên,Xã Yên Trạch,Xã Tân Thành',
            'Huyện Văn Quan' => 'Thị trấn Văn Quan,Xã Trấn Ninh,Xã Liên Hội,Xã Hòa Bình,Xã Tú Xuyên,Xã Điềm He,Xã An Sơn,Xã Khánh Khê,Xã Lương Năng,Xã Đồng Giáp,Xã Bình Phúc,Xã Tràng Các,Xã Tân Đoàn,Xã Tri Lễ,Xã Tràng Phái,Xã Yên Phúc,Xã Hữu Lễ',
            'Huyện Bắc Sơn' => 'Thị trấn Bắc Sơn,Xã Long Đống,Xã Vạn Thủy,Xã Đồng ý,Xã Tân Tri,Xã Bắc Quỳnh,Xã Hưng Vũ,Xã Tân Lập,Xã Vũ Sơn,Xã Chiêu Vũ,Xã Tân Hương,Xã Chiến Thắng,Xã Vũ Lăng,Xã Trấn Yên,Xã Vũ Lễ,Xã Nhất Hòa,Xã Tân Thành,Xã Nhất Tiến',
            'Huyện Hữu Lũng' => 'Thị trấn Hữu Lũng,Xã Hữu Liên,Xã Yên Bình,Xã Quyết Thắng,Xã Hòa Bình,Xã Yên Thịnh,Xã Yên Sơn,Xã Thiện Tân,Xã Yên Vượng,Xã Minh Tiến,Xã Nhật Tiến,Xã Thanh Sơn,Xã Đồng Tân,Xã Cai Kinh,Xã Hòa Lạc,Xã Vân Nham,Xã Đồng Tiến,Xã Tân Thành,Xã Hòa Sơn,Xã Minh Sơn,Xã Hồ Sơn,Xã Sơn Hà,Xã Minh Hòa,Xã Hòa Thắng',
            'Huyện Chi Lăng' => 'Thị trấn Đồng Mỏ,Thị trấn Chi Lăng,Xã Vân An,Xã Vân Thủy,Xã Gia Lộc,Xã Bắc Thủy,Xã Chiến Thắng,Xã Mai Sao,Xã Bằng Hữu,Xã Thượng Cường,Xã Bằng Mạc,Xã Nhân Lý,Xã Lâm Sơn,Xã Liên Sơn,Xã Vạn Linh,Xã Hòa Bình,Xã Hữu Kiên,Xã Quan Sơn,Xã Y Tịch,Xã Chi Lăng',
            'Huyện Lộc Bình' => 'Thị trấn Na Dương,Thị trấn Lộc Bình,Xã Mẫu Sơn,Xã Yên Khoái,Xã Khánh Xuân,Xã Tú Mịch,Xã Hữu Khánh,Xã Đồng Bục,Xã Tam Gia,Xã Tú Đoạn,Xã Khuất Xá,Xã Tĩnh Bắc,Xã Thống Nhất,Xã Sàn Viên,Xã Đông Quan,Xã Minh Hiệp,Xã Hữu Lân,Xã Lợi Bác,Xã Nam Quan,Xã Xuân Dương,Xã Ái Quốc',
            'Huyện Đình Lập' => 'Thị trấn Đình Lập,Thị trấn NT Thái Bình,Xã Bắc Xa,Xã Bính Xá,Xã Kiên Mộc,Xã Đình Lập,Xã Thái Bình,Xã Cường Lợi,Xã Châu Sơn,Xã Lâm Ca,Xã Đồng Thắng,Xã Bắc Lãng',
        ],
        'Tỉnh Quảng Ninh' => [
            'Thành phố Hạ Long' => 'Phường Hà Khánh,Phường Hà Phong,Phường Hà Khẩu,Phường Cao Xanh,Phường Giếng Đáy,Phường Hà Tu,Phường Hà Trung,Phường Hà Lầm,Phường Bãi Cháy,Phường Cao Thắng,Phường Hùng Thắng,Phường Yết Kiêu,Phường Trần Hưng Đạo,Phường Hồng Hải,Phường Hồng Gai,Phường Bạch Đằng,Phường Hồng Hà,Phường Tuần Châu,Phường Việt Hưng,Phường Đại Yên,Phường Hoành Bồ,Xã Kỳ Thượng,Xã Đồng Sơn,Xã Tân Dân,Xã Đồng Lâm,Xã Hòa Bình,Xã Vũ Oai,Xã Dân Chủ,Xã Quảng La,Xã Bằng Cả,Xã Thống Nhất,Xã Sơn Dương,Xã Lê Lợi',
            'Thành phố Móng Cái' => 'Phường Ka Long,Phường Trần Phú,Phường Ninh Dương,Phường Hoà Lạc,Phường Trà Cổ,Xã Hải Sơn,Xã Bắc Sơn,Xã Hải Đông,Xã Hải Tiến,Phường Hải Yên,Xã Quảng Nghĩa,Phường Hải Hoà,Xã Hải Xuân,Xã Vạn Ninh,Phường Bình Ngọc,Xã Vĩnh Trung,Xã Vĩnh Thực',
            'Thành phố Cẩm Phả' => 'Phường Mông Dương,Phường Cửa Ông,Phường Cẩm Sơn,Phường Cẩm Đông,Phường Cẩm Phú,Phường Cẩm Tây,Phường Quang Hanh,Phường Cẩm Thịnh,Phường Cẩm Thủy,Phường Cẩm Thạch,Phường Cẩm Thành,Phường Cẩm Trung,Phường Cẩm Bình,Xã Cộng Hòa,Xã Cẩm Hải,Xã Dương Huy',
            'Thành phố Uông Bí' => 'Phường Vàng Danh,Phường Thanh Sơn,Phường Bắc Sơn,Phường Quang Trung,Phường Trưng Vương,Phường Nam Khê,Phường Yên Thanh,Xã Thượng Yên Công,Phường Phương Đông,Phường Phương Nam',
            'Huyện Bình Liêu' => 'Thị trấn Bình Liêu,Xã Hoành Mô,Xã Đồng Tâm,Xã Đồng Văn,Xã Vô Ngại,Xã Lục Hồn,Xã Húc Động',
            'Huyện Tiên Yên' => 'Thị trấn Tiên Yên,Xã Hà Lâu,Xã Đại Dực,Xã Phong Dụ,Xã Điền Xá,Xã Đông Ngũ,Xã Yên Than,Xã Đông Hải,Xã Hải Lạng,Xã Tiên Lãng,Xã Đồng Rui',
            'Huyện Đầm Hà' => 'Thị trấn Đầm Hà,Xã Quảng Lâm,Xã Quảng An,Xã Tân Bình,Xã Dực Yên,Xã Quảng Tân,Xã Đầm Hà,Xã Tân Lập,Xã Đại Bình',
            'Huyện Hải Hà' => 'Thị trấn Quảng Hà,Xã Quảng Đức,Xã Quảng Sơn,Xã Quảng Thành,Xã Quảng Thịnh,Xã Quảng Minh,Xã Quảng Chính,Xã Quảng Long,Xã Đường Hoa,Xã Quảng Phong,Xã Cái Chiên',
            'Huyện Ba Chẽ' => 'Thị trấn Ba Chẽ,Xã Thanh Sơn,Xã Thanh Lâm,Xã Đạp Thanh,Xã Nam Sơn,Xã Lương Mông,Xã Đồn Đạc,Xã Minh Cầm',
            'Huyện Vân Đồn' => 'Thị trấn Cái Rồng,Xã Đài Xuyên,Xã Bình Dân,Xã Vạn Yên,Xã Minh Châu,Xã Đoàn Kết,Xã Hạ Long,Xã Đông Xá,Xã Bản Sen,Xã Thắng Lợi,Xã Quan Lạn,Xã Ngọc Vừng',
            'Thị xã Đông Triều' => 'Phường Mạo Khê,Phường Đông Triều,Xã An Sinh,Xã Tràng Lương,Xã Bình Khê,Xã Việt Dân,Xã Tân Việt,Xã Bình Dương,Phường Đức Chính,Phường Tràng An,Xã Nguyễn Huệ,Xã Thủy An,Phường Xuân Sơn,Xã Hồng Thái Tây,Xã Hồng Thái Đông,Phường Hoàng Quế,Phường Yên Thọ,Phường Hồng Phong,Phường Kim Sơn,Phường Hưng Đạo,Xã Yên Đức',
            'Thị xã Quảng Yên' => 'Phường Quảng Yên,Phường Đông Mai,Phường Minh Thành,Xã Sông Khoai,Xã Hiệp Hòa,Phường Cộng Hòa,Xã Tiền An,Xã Hoàng Tân,Phường Tân An,Phường Yên Giang,Phường Nam Hoà,Phường Hà An,Xã Cẩm La,Phường Phong Hải,Phường Yên Hải,Xã Liên Hòa,Phường Phong Cốc,Xã Liên Vị,Xã Tiền Phong',
            'Huyện Cô Tô' => 'Thị trấn Cô Tô,Xã Đồng Tiến,Xã Thanh Lân',
        ],
        'Tỉnh Bắc Giang' => [
            'Thành phố Bắc Giang' => 'Phường Thọ Xương,Phường Trần Nguyên Hãn,Phường Ngô Quyền,Phường Hoàng Văn Thụ,Phường Trần Phú,Phường Mỹ Độ,Phường Lê Lợi,Xã Song Mai,Phường Xương Giang,Phường Đa Mai,Phường Dĩnh Kế,Xã Dĩnh Trì,Xã Tân Mỹ,Xã Đồng Sơn,Xã Tân Tiến,Xã Song Khê',
            'Huyện Yên Thế' => 'Xã Đồng Tiến,Xã Canh Nậu,Xã Xuân Lương,Xã Tam Tiến,Xã Đồng Vương,Xã Đồng Hưu,Xã Đồng Tâm,Xã Tam Hiệp,Xã Tiến Thắng,Xã Hồng Kỳ,Xã Đồng Lạc,Xã Đông Sơn,Xã Tân Hiệp,Xã Hương Vĩ,Xã Đồng Kỳ,Xã An Thượng,Thị trấn Phồn Xương,Xã Tân Sỏi,Thị trấn Bố Hạ',
            'Huyên Tân Yên' => 'Xã Lan Giới,Thị trấn Nhã Nam,Xã Tân Trung,Xã Đại Hóa,Xã Quang Tiến,Xã Phúc Sơn,Xã An Dương,Xã Phúc Hòa,Xã Liên Sơn,Xã Hợp Đức,Xã Lam Cốt,Xã Cao Xá,Thị trấn Cao Thượng,Xã Việt Ngọc,Xã Song Vân,Xã Ngọc Châu,Xã Ngọc Vân,Xã Việt Lập,Xã Liên Chung,Xã Ngọc Thiện,Xã Ngọc Lý,Xã Quế Nham',
            'Huyện Lạng Giang' => 'Thị trấn Vôi,Xã Nghĩa Hòa,Xã Nghĩa Hưng,Xã Quang Thịnh,Xã Hương Sơn,Xã Đào Mỹ,Xã Tiên Lục,Xã An Hà,Thị trấn Kép,Xã Mỹ Hà,Xã Hương Lạc,Xã Dương Đức,Xã Tân Thanh,Xã Yên Mỹ,Xã Tân Hưng,Xã Mỹ Thái,Xã Xương Lâm,Xã Xuân Hương,Xã Tân Dĩnh,Xã Đại Lâm,Xã Thái Đào',
            'Huyện Lục Nam' => 'Thị trấn Đồi Ngô,Xã Đông Hưng,Xã Đông Phú,Xã Tam Dị,Xã Bảo Sơn,Xã Bảo Đài,Xã Thanh Lâm,Xã Tiên Nha,Xã Trường Giang,Xã Phương Sơn,Xã Chu Điện,Xã Cương Sơn,Xã Nghĩa Phương,Xã Vô Tranh,Xã Bình Sơn,Xã Lan Mẫu,Xã Yên Sơn,Xã Khám Lạng,Xã Huyền Sơn,Xã Trường Sơn,Xã Lục Sơn,Xã Bắc Lũng,Xã Vũ Xá,Xã Cẩm Lý,Xã Đan Hội',
            'Huyện Lục Ngạn' => 'Thị trấn Chũ,Xã Cấm Sơn,Xã Tân Sơn,Xã Phong Minh,Xã Phong Vân,Xã Xa Lý,Xã Hộ Đáp,Xã Sơn Hải,Xã Thanh Hải,Xã Kiên Lao,Xã Biên Sơn,Xã Kiên Thành,Xã Hồng Giang,Xã Kim Sơn,Xã Tân Hoa,Xã Giáp Sơn,Xã Biển Động,Xã Quý Sơn,Xã Trù Hựu,Xã Phì Điền,Xã Tân Quang,Xã Đồng Cốc,Xã Tân Lập,Xã Phú Nhuận,Xã Mỹ An,Xã Nam Dương,Xã Tân Mộc,Xã Đèo Gia,Xã Phượng Sơn',
            'Huyện Sơn Động' => 'Thị trấn An Châu,Thị trấn Tây Yên Tử,Xã Vân Sơn,Xã Hữu Sản,Xã Đại Sơn,Xã Phúc Sơn,Xã Giáo Liêm,Xã Cẩm Đàn,Xã An Lạc,Xã Vĩnh An,Xã Yên Định,Xã Lệ Viễn,Xã An Bá,Xã Tuấn Đạo,Xã Dương Hưu,Xã Long Sơn,Xã Thanh Luận',
            'Huyện Yên Dũng' => 'Thị trấn Nham Biền,Thị trấn Tân An,Xã Lão Hộ,Xã Hương Gián,Xã Quỳnh Sơn,Xã Nội Hoàng,Xã Tiền Phong,Xã Xuân Phú,Xã Tân Liễu,Xã Trí Yên,Xã Lãng Sơn,Xã Yên Lư,Xã Tiến Dũng,Xã Đức Giang,Xã Cảnh Thụy,Xã Tư Mại,Xã Đồng Việt,Xã Đồng Phúc',
            'Huyện Việt Yên' => 'Xã Thượng Lan,Xã Việt Tiến,Xã Nghĩa Trung,Xã Minh Đức,Xã Hương Mai,Xã Tự Lạn,Thị trấn Bích Động,Xã Trung Sơn,Xã Hồng Thái,Xã Tiên Sơn,Xã Tăng Tiến,Xã Quảng Minh,Thị trấn Nếnh,Xã Ninh Sơn,Xã Vân Trung,Xã Vân Hà,Xã Quang Châu',
            'Huyện Hiệp Hòa' => 'Xã Đồng Tân,Xã Thanh Vân,Xã Hoàng Lương,Xã Hoàng Vân,Xã Hoàng Thanh,Xã Hoàng An,Xã Ngọc Sơn,Xã Thái Sơn,Xã Hòa Sơn,Thị trấn Thắng,Xã Quang Minh,Xã Lương Phong,Xã Hùng Sơn,Xã Đại Thành,Xã Thường Thắng,Xã Hợp Thịnh,Xã Danh Thắng,Xã Mai Trung,Xã Đoan Bái,Xã Bắc Lý,Xã Xuân Cẩm,Xã Hương Lâm,Xã Đông Lỗ,Xã Châu Minh,Xã Mai Đình',
        ],
        'Tỉnh Phú Thọ' => [
            'Thành phố Việt Trì' => 'Phường Dữu Lâu,Phường Vân Cơ,Phường Nông Trang,Phường Tân Dân,Phường Gia Cẩm,Phường Tiên Cát,Phường Thọ Sơn,Phường Thanh Miếu,Phường Bạch Hạc,Phường Bến Gót,Phường Vân Phú,Xã Phượng Lâu,Xã Thụy Vân,Phường Minh Phương,Xã Trưng Vương,Phường Minh Nông,Xã Sông Lô,Xã Kim Đức,Xã Hùng Lô,Xã Hy Cương,Xã Chu Hóa,Xã Thanh Đình',
            'Thị xã Phú Thọ' => 'Phường Hùng Vương,Phường Phong Châu,Phường Âu Cơ,Xã Hà Lộc,Xã Phú Hộ,Xã Văn Lung,Xã Thanh Minh,Xã Hà Thạch,Phường Thanh Vinh',
            'Huyện Đoan Hùng' => 'Thị trấn Đoan Hùng,Xã Hùng Xuyên,Xã Bằng Luân,Xã Vân Du,Xã Phú Lâm,Xã Minh Lương,Xã Bằng Doãn,Xã Chí Đám,Xã Phúc Lai,Xã Ngọc Quan,Xã Hợp Nhất,Xã Sóc Đăng,Xã Tây Cốc,Xã Yên Kiện,Xã Hùng Long,Xã Vụ Quang,Xã Vân Đồn,Xã Tiêu Sơn,Xã Minh Tiến,Xã Minh Phú,Xã Chân Mộng,Xã Ca Đình',
            'Huyện Hạ Hòa' => 'Thị trấn Hạ Hoà,Xã Đại Phạm,Xã Đan Thượng,Xã Hà Lương,Xã Tứ Hiệp,Xã Hiền Lương,Xã Phương Viên,Xã Gia Điền,Xã Ấm Hạ,Xã Hương Xạ,Xã Xuân Áng,Xã Yên Kỳ,Xã Minh Hạc,Xã Lang Sơn,Xã Bằng Giã,Xã Yên Luật,Xã Vô Tranh,Xã Văn Lang,Xã Minh Côi,Xã Vĩnh Chân',
            'Huyện Thanh Ba' => 'Thị trấn Thanh Ba,Xã Vân Lĩnh,Xã Đông Lĩnh,Xã Đại An,Xã Hanh Cù,Xã Đồng Xuân,Xã Quảng Yên,Xã Ninh Dân,Xã Võ Lao,Xã Khải Xuân,Xã Mạn Lạn,Xã Hoàng Cương,Xã Chí Tiên,Xã Đông Thành,Xã Sơn Cương,Xã Thanh Hà,Xã Đỗ Sơn,Xã Đỗ Xuyên,Xã Lương Lỗ',
            'Huyện Phù Ninh' => 'Thị trấn Phong Châu,Xã Phú Mỹ,Xã Lệ Mỹ,Xã Liên Hoa,Xã Trạm Thản,Xã Trị Quận,Xã Trung Giáp,Xã Tiên Phú,Xã Hạ Giáp,Xã Bảo Thanh,Xã Phú Lộc,Xã Gia Thanh,Xã Tiên Du,Xã Phú Nham,Xã An Đạo,Xã Bình Phú,Xã Phù Ninh',
            'Huyện Yên Lập' => 'Thị trấn Yên Lập,Xã Mỹ Lung,Xã Mỹ Lương,Xã Lương Sơn,Xã Xuân An,Xã Xuân Viên,Xã Xuân Thủy,Xã Trung Sơn,Xã Hưng Long,Xã Nga Hoàng,Xã Đồng Lạc,Xã Thượng Long,Xã Đồng Thịnh,Xã Phúc Khánh,Xã Minh Hòa,Xã Ngọc Lập,Xã Ngọc Đồng',
            'Huyện Cẩm Khê' => 'Thị trấn Cẩm Khê,Xã Tiên Lương,Xã Tuy Lộc,Xã Ngô Xá,Xã Minh Tân,Xã Phượng Vĩ,Xã Thụy Liễu,Xã Tùng Khê,Xã Tam Sơn,Xã Văn Bán,Xã Cấp Dẫn,Xã Xương Thịnh,Xã Phú Khê,Xã Sơn Tình,Xã Yên Tập,Xã Hương Lung,Xã Tạ Xá,Xã Phú Lạc,Xã Chương Xá,Xã Hùng Việt,Xã Văn Khúc,Xã Yên Dưỡng,Xã Điêu Lương,Xã Đồng Lương',
            'Huyện Tam Nông' => 'Thị trấn Hưng Hoá,Xã Hiền Quan,Xã Bắc Sơn,Xã Thanh Uyên,Xã Lam Sơn,Xã Vạn Xuân,Xã Quang Húc,Xã Hương Nộn,Xã Tề Lễ,Xã Thọ Văn,Xã Dị Nậu,Xã Dân Quyền',
            'Huyện Lâm Thao' => 'Thị trấn Lâm Thao,Xã Tiên Kiên,Thị trấn Hùng Sơn,Xã Xuân Lũng,Xã Xuân Huy,Xã Thạch Sơn,Xã Sơn Vi,Xã Phùng Nguyên,Xã Cao Xá,Xã Vĩnh Lại,Xã Tứ Xã,Xã Bản Nguyên',
            'Huyện Thanh Sơn' => 'Thị trấn Thanh Sơn,Xã Sơn Hùng,Xã Địch Quả,Xã Giáp Lai,Xã Thục Luyện,Xã Võ Miếu,Xã Thạch Khoán,Xã Cự Thắng,Xã Tất Thắng,Xã Văn Miếu,Xã Cự Đồng,Xã Thắng Sơn,Xã Tân Minh,Xã Hương Cần,Xã Khả Cửu,Xã Đông Cửu,Xã Tân Lập,Xã Yên Lãng,Xã Yên Lương,Xã Thượng Cửu,Xã Lương Nha,Xã Yên Sơn,Xã Tinh Nhuệ',
            'Huyện Thanh Thủy' => 'Xã Đào Xá,Xã Thạch Đồng,Xã Xuân Lộc,Xã Tân Phương,Thị trấn Thanh Thủy,Xã Sơn Thủy,Xã Bảo Yên,Xã Đoan Hạ,Xã Đồng Trung,Xã Hoàng Xá,Xã Tu Vũ',
            'Huyện Tân Sơn' => 'Xã Thu Cúc,Xã Thạch Kiệt,Xã Thu Ngạc,Xã Kiệt Sơn,Xã Đồng Sơn,Xã Lai Đồng,Xã Tân Phú,Xã Mỹ Thuận,Xã Tân Sơn,Xã Xuân Đài,Xã Minh Đài,Xã Văn Luông,Xã Xuân Sơn,Xã Long Cốc,Xã Kim Thượng,Xã Tam Thanh,Xã Vinh Tiền',
        ],
        'Tỉnh Vĩnh Phúc' => [
            'Thành phố Vĩnh Yên' => 'Phường Tích Sơn,Phường Liên Bảo,Phường Hội Hợp,Phường Đống Đa,Phường Ngô Quyền,Phường Đồng Tâm,Xã Định Trung,Phường Khai Quang,Xã Thanh Trù',
            'Thành phố Phúc Yên' => 'Phường Trưng Trắc,Phường Hùng Vương,Phường Trưng Nhị,Phường Phúc Thắng,Phường Xuân Hoà,Phường Đồng Xuân,Xã Ngọc Thanh,Xã Cao Minh,Phường Nam Viêm,Phường Tiền Châu',
            'Huyện Lập Thạch' => 'Thị trấn Lập Thạch,Xã Quang Sơn,Xã Ngọc Mỹ,Xã Hợp Lý,Xã Bắc Bình,Xã Thái Hòa,Thị trấn Hoa Sơn,Xã Liễn Sơn,Xã Xuân Hòa,Xã Vân Trục,Xã Liên Hòa,Xã Tử Du,Xã Bàn Giản,Xã Xuân Lôi,Xã Đồng Ích,Xã Tiên Lữ,Xã Văn Quán,Xã Đình Chu,Xã Triệu Đề,Xã Sơn Đông',
            'Huyện Tam Dương' => 'Thị trấn Hợp Hòa,Xã Hoàng Hoa,Xã Đồng Tĩnh,Xã Kim Long,Xã Hướng Đạo,Xã Đạo Tú,Xã An Hòa,Xã Thanh Vân,Xã Duy Phiên,Xã Hoàng Đan,Xã Hoàng Lâu,Xã Vân Hội,Xã Hợp Thịnh',
            'Huyện Tam Đảo' => 'Thị trấn Tam Đảo,Thị trấn Hợp Châu,Xã Đạo Trù,Xã Yên Dương,Xã Bồ Lý,Thị trấn Đại Đình,Xã Tam Quan,Xã Hồ Sơn,Xã Minh Quang',
            'Huyện Bình Xuyên' => 'Thị trấn Hương Canh,Thị trấn Gia Khánh,Xã Trung Mỹ,Thị trấn Bá Hiến,Xã Thiện Kế,Xã Hương Sơn,Xã Tam Hợp,Xã Quất Lưu,Xã Sơn Lôi,Thị trấn Đạo Đức,Xã Tân Phong,Thị trấn Thanh Lãng,Xã Phú Xuân',
            'Huyện Yên Lạc' => 'Thị trấn Yên Lạc,Xã Đồng Cương,Xã Đồng Văn,Xã Bình Định,Xã Trung Nguyên,Xã Tề Lỗ,Xã Tam Hồng,Xã Yên Đồng,Xã Văn Tiến,Xã Nguyệt Đức,Xã Yên Phương,Xã Hồng Phương,Xã Trung Kiên,Xã Liên Châu,Xã Đại Tự,Xã Hồng Châu,Xã Trung Hà',
            'Huyện Vĩnh Tường' => 'Thị trấn Vĩnh Tường,Xã Kim Xá,Xã Yên Bình,Xã Chấn Hưng,Xã Nghĩa Hưng,Xã Yên Lập,Xã Việt Xuân,Xã Bồ Sao,Xã Đại Đồng,Xã Tân Tiến,Xã Lũng Hoà,Xã Cao Đại,Thị Trấn Thổ Tang,Xã Vĩnh Sơn,Xã Bình Dương,Xã Tân Phú,Xã Thượng Trưng,Xã Vũ Di,Xã Lý Nhân,Xã Tuân Chính,Xã Vân Xuân,Xã Tam Phúc,Thị trấn Tứ Trưng,Xã Ngũ Kiên,Xã An Tường,Xã Vĩnh Thịnh,Xã Phú Đa,Xã Vĩnh Ninh',
            'Huyện Sông Lô' => 'Xã Lãng Công,Xã Quang Yên,Xã Bạch Lưu,Xã Hải Lựu,Xã Đồng Quế,Xã Nhân Đạo,Xã Đôn Nhân,Xã Phương Khoan,Xã Tân Lập,Xã Nhạo Sơn,Thị trấn Tam Sơn,Xã Như Thụy,Xã Yên Thạch,Xã Đồng Thịnh,Xã Tứ Yên,Xã Đức Bác,Xã Cao Phong',
        ],
        'Tỉnh Bắc Ninh' => [
            'Thành phố Bắc Ninh' => 'Phường Vũ Ninh,Phường Đáp Cầu,Phường Thị Cầu,Phường Kinh Bắc,Phường Vệ An,Phường Tiền An,Phường Đại Phúc,Phường Ninh Xá,Phường Suối Hoa,Phường Võ Cường,Phường Hòa Long,Phường Vạn An,Phường Khúc Xuyên,Phường Phong Khê,Phường Kim Chân,Phường Vân Dương,Phường Nam Sơn,Phường Khắc Niệm,Phường Hạp Lĩnh',
            'Huyện Yên Phong' => 'Thị trấn Chờ,Xã Dũng Liệt,Xã Tam Đa,Xã Tam Giang,Xã Yên Trung,Xã Thụy Hòa,Xã Hòa Tiến,Xã Đông Tiến,Xã Yên Phụ,Xã Trung Nghĩa,Xã Đông Phong,Xã Long Châu,Xã Văn Môn,Xã Đông Thọ',
            'Huyện Quế Võ' => 'Thị trấn Phố Mới,Xã Việt Thống,Xã Đại Xuân,Xã Nhân Hòa,Xã Bằng An,Xã Phương Liễu,Xã Quế Tân,Xã Phù Lương,Xã Phù Lãng,Xã Phượng Mao,Xã Việt Hùng,Xã Ngọc Xá,Xã Châu Phong,Xã Bồng Lai,Xã Cách Bi,Xã Đào Viên,Xã Yên Giả,Xã Mộ Đạo,Xã Đức Long,Xã Chi Lăng,Xã Hán Quảng',
            'Huyện Tiên Du' => 'Thị trấn Lim,Xã Phú Lâm,Xã Nội Duệ,Xã Liên Bão,Xã Hiên Vân,Xã Hoàn Sơn,Xã Lạc Vệ,Xã Việt Đoàn,Xã Phật Tích,Xã Tân Chi,Xã Đại Đồng,Xã Tri Phương,Xã Minh Đạo,Xã Cảnh Hưng',
            'Thị xã Từ Sơn' => 'Phường Đông Ngàn,Phường Tam Sơn,Phường Hương Mạc,Phường Tương Giang,Phường Phù Khê,Phường Đồng Kỵ,Phường Trang Hạ,Phường Đồng Nguyên,Phường Châu Khê,Phường Tân Hồng,Phường Đình Bảng,Phường Phù Chẩn',
            'Huyện Thuận Thành' => 'Thị trấn Hồ,Xã Hoài Thượng,Xã Đại Đồng Thành,Xã Mão Điền,Xã Song Hồ,Xã Đình Tổ,Xã An Bình,Xã Trí Quả,Xã Gia Đông,Xã Thanh Khương,Xã Trạm Lộ,Xã Xuân Lâm,Xã Hà Mãn,Xã Ngũ Thái,Xã Nguyệt Đức,Xã Ninh Xá,Xã Nghĩa Đạo,Xã Song Liễu',
            'Huyện Gia Bình' => 'Thị trấn Gia Bình,Xã Vạn Ninh,Xã Thái Bảo,Xã Giang Sơn,Xã Cao Đức,Xã Đại Lai,Xã Song Giang,Xã Bình Dương,Xã Lãng Ngâm,Xã Nhân Thắng,Xã Xuân Lai,Xã Đông Cứu,Xã Đại Bái,Xã Quỳnh Phú',
            'Huyện Lương Tài' => 'Thị trấn Thứa,Xã An Thịnh,Xã Trung Kênh,Xã Phú Hòa,Xã Mỹ Hương,Xã Tân Lãng,Xã Quảng Phú,Xã Trừng Xá,Xã Lai Hạ,Xã Trung Chính,Xã Minh Tân,Xã Bình Định,Xã Phú Lương,Xã Lâm Thao',
        ],
        'Tỉnh Hải Dương' => [
            'Thành phố Hải Dương' => 'Phường Cẩm Thượng,Phường Bình Hàn,Phường Ngọc Châu,Phường Nhị Châu,Phường Quang Trung,Phường Nguyễn Trãi,Phường Phạm Ngũ Lão,Phường Trần Hưng Đạo,Phường Trần Phú,Phường Thanh Bình,Phường Tân Bình,Phường Lê Thanh Nghị,Phường Hải Tân,Phường Tứ Minh,Phường Việt Hoà,Phường Ái Quốc,Xã An Thượng,Phường Nam Đồng,Xã Quyết Thắng,Xã Tiền Tiến,Phường Thạch Khôi,Xã Liên Hồng,Phường Tân Hưng,Xã Gia Xuyên,Xã Ngọc Sơn',
            'Thành phố Chí Linh' => 'Phường Phả Lại,Phường Sao Đỏ,Phường Bến Tắm,Xã Hoàng Hoa Thám,Xã Bắc An,Xã Hưng Đạo,Xã Lê Lợi,Phường Hoàng Tiến,Phường Cộng Hoà,Phường Hoàng Tân,Phường Cổ Thành,Phường Văn An,Phường Chí Minh,Phường Văn Đức,Phường Thái Học,Xã Nhân Huệ,Phường An Lạc,Phường Đồng Lạc,Phường Tân Dân',
            'Huyện Nam Sách' => 'Thị trấn Nam Sách,Xã Nam Hưng,Xã Nam Tân,Xã Hợp Tiến,Xã Hiệp Cát,Xã Thanh Quang,Xã Quốc Tuấn,Xã Nam Chính,Xã An Bình,Xã Nam Trung,Xã An Sơn,Xã Cộng Hòa,Xã Thái Tân,Xã An Lâm,Xã Phú Điền,Xã Nam Hồng,Xã Hồng Phong,Xã Đồng Lạc,Xã Minh Tân',
            'Thị xã Kinh Môn' => 'Phường An Lưu,Xã Bạch Đằng,Phường Thất Hùng,Xã Lê Ninh,Xã Hoành Sơn,Phường Phạm Thái,Phường Duy Tân,Phường Tân Dân,Phường Minh Tân,Xã Quang Thành,Xã Hiệp Hòa,Phường Phú Thứ,Xã Thăng Long,Xã Lạc Long,Phường An Sinh,Phường Hiệp Sơn,Xã Thượng Quận,Phường An Phụ,Phường Hiệp An,Phường Long Xuyên,Phường Thái Thịnh,Phường Hiến Thành,Xã Minh Hòa',
            'Huyện Kim Thành' => 'Thị trấn Phú Thái,Xã Lai Vu,Xã Cộng Hòa,Xã Thượng Vũ,Xã Cổ Dũng,Xã Tuấn Việt,Xã Kim Xuyên,Xã Phúc Thành A,Xã Ngũ Phúc,Xã Kim Anh,Xã Kim Liên,Xã Kim Tân,Xã Kim Đính,Xã Bình Dân,Xã Tam Kỳ,Xã Đồng Cẩm,Xã Liên Hòa,Xã Đại Đức',
            'Huyện Thanh Hà' => 'Thị trấn Thanh Hà,Xã Hồng Lạc,Xã Việt Hồng,Xã Tân Việt,Xã Cẩm Chế,Xã Thanh An,Xã Thanh Lang,Xã Tân An,Xã Liên Mạc,Xã Thanh Hải,Xã Thanh Khê,Xã Thanh Xá,Xã Thanh Xuân,Xã Thanh Thủy,Xã An Phượng,Xã Thanh Sơn,Xã Thanh Quang,Xã Thanh Hồng,Xã Thanh Cường,Xã Vĩnh Lập',
            'Huyện Cẩm Giàng' => 'Thị trấn Cẩm Giang,Thị trấn Lai Cách,Xã Cẩm Hưng,Xã Cẩm Hoàng,Xã Cẩm Văn,Xã Ngọc Liên,Xã Thạch Lỗi,Xã Cẩm Vũ,Xã Đức Chính,Xã Định Sơn,Xã Lương Điền,Xã Cao An,Xã Tân Trường,Xã Cẩm Phúc,Xã Cẩm Điền,Xã Cẩm Đông,Xã Cẩm Đoài',
            'Huyện Bình Giang' => 'Thị trấn Kẻ Sặt,Xã Vĩnh Hưng,Xã Hùng Thắng,Xã Vĩnh Hồng,Xã Long Xuyên,Xã Tân Việt,Xã Thúc Kháng,Xã Tân Hồng,Xã Bình Minh,Xã Hồng Khê,Xã Thái Học,Xã Cổ Bì,Xã Nhân Quyền,Xã Thái Dương,Xã Thái Hòa,Xã Bình Xuyên',
            'Huyện Gia Lộc' => 'Thị trấn Gia Lộc,Xã Thống Nhất,Xã Yết Kiêu,Xã Gia Tân,Xã Tân Tiến,Xã Gia Khánh,Xã Gia Lương,Xã Lê Lợi,Xã Toàn Thắng,Xã Hoàng Diệu,Xã Hồng Hưng,Xã Phạm Trấn,Xã Đoàn Thượng,Xã Thống Kênh,Xã Quang Minh,Xã Đồng Quang,Xã Nhật Tân,Xã Đức Xương',
            'Huyện Tứ Kỳ' => 'Thị trấn Tứ Kỳ,Xã Đại Sơn,Xã Hưng Đạo,Xã Ngọc Kỳ,Xã Bình Lăng,Xã Chí Minh,Xã Tái Sơn,Xã Quang Phục,Xã Dân Chủ,Xã Tân Kỳ,Xã Quang Khải,Xã Đại Hợp,Xã Quảng Nghiệp,Xã An Thanh,Xã Minh Đức,Xã Văn Tố,Xã Quang Trung,Xã Phượng Kỳ,Xã Cộng Lạc,Xã Tiên Động,Xã Nguyên Giáp,Xã Hà Kỳ,Xã Hà Thanh',
            'Huyện Ninh Giang' => 'Thị trấn Ninh Giang,Xã Ứng Hoè,Xã Nghĩa An,Xã Hồng Đức,Xã An Đức,Xã Vạn Phúc,Xã Tân Hương,Xã Vĩnh Hòa,Xã Đông Xuyên,Xã Tân Phong,Xã Ninh Hải,Xã Đồng Tâm,Xã Tân Quang,Xã Kiến Quốc,Xã Hồng Dụ,Xã Văn Hội,Xã Hồng Phong,Xã Hiệp Lực,Xã Hồng Phúc,Xã Hưng Long',
            'Huyện Thanh Miện' => 'Thị trấn Thanh Miện,Xã Thanh Tùng,Xã Phạm Kha,Xã Ngô Quyền,Xã Đoàn Tùng,Xã Hồng Quang,Xã Tân Trào,Xã Lam Sơn,Xã Đoàn Kết,Xã Lê Hồng,Xã Tứ Cường,Xã Ngũ Hùng,Xã Cao Thắng,Xã Chi Lăng Bắc,Xã Chi Lăng Nam,Xã Thanh Giang,Xã Hồng Phong',
        ]
//        todo: tỉnh Hải Phòng
    ];

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
        self::insertSampleCart();
        self::insertSampleOrder();
        self::insertSampleOrderTracking();
        self::insertSampleTrackingStatus();
    }
}