<?php
 
namespace App\Http\Controllers;
 
use App\Category;
use App\Product;
use App\Components\Recusive;
use Illuminate\Http\Request;
use App\Traits\StorageImageTrait;
 
class AdminProductController extends Controller
{
    use StorageImageTrait;
    private $category;
    private $product;
    public function __construct (Category $category,Product $product) {
        $this->category = $category;
        $this->product = $product;
    }
    public function getCategory ($parentId) {
        $data = $this->category->all();
        $recusive = new Recusive ($data); // create instance
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }
 
    public function index () {
        return view ('admin.product.index');
    }
    public function create () {
        $htmlOption =  $this->getCategory($parentId='');
        return view ('admin.product.add',compact('htmlOption'));
    }
    public function store (Request $request) {
        $dataProductCreate = [
            'name' => $request->name,
            'price' => $request->price,
            'content' => $request->contents,
            'user_id' => auth()->id(), // user login
            'category_id' => $request->category_id

        ];
        $dataUploadFeatureImage = $this->storageImageUpload($request,'feature_image_path','product');
        if (!empty($dataUploadFeatureImage)) {
            $dataProductCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
            $dataProductCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
        }
        $product = $this->product->create($dataProductCreate);
        dd($product);
    }
}
