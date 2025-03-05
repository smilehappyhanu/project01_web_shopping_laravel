<?php
 
namespace App\Http\Controllers;
 
use App\Category;
use App\Product;
use App\ProductImage;
use App\Tag;
use App\ProductTag;

use App\Components\Recusive;
use Illuminate\Http\Request;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\Log;
use Storage;
use DB;
 
class AdminProductController extends Controller
{
    use StorageImageTrait;
    private $category;
    private $product;
    private $productImage;
    private $productTag;
    private $tag;
   
    public function __construct (Category $category,Product $product,ProductImage $productImage,ProductTag $productTag,Tag $tag) {
        $this->category = $category;
        $this->product = $product;
        $this->productImage = $productImage;
        $this->productTag = $productTag;
        $this->tag = $tag;    
    }
    public function getCategory ($parentId) {
        $data = $this->category->all();
        $recusive = new Recusive ($data); // create instance
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }
 
    public function index () {
        $products = $this->product->paginate(10);
        return view ('admin.product.index',compact('products'));
    }
    public function create () {
        $htmlOption =  $this->getCategory($parentId='');
        return view ('admin.product.add',compact('htmlOption'));
    }
    public function store (Request $request) {
        try {
            DB::beginTransaction();
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
            // Insert data to product_images
            if ($request->hasFile('image_path')) {
                foreach ($request->image_path as $fileItem) {
                    $dataProductImageDetail = $this->storageImageUploadMultiple($fileItem,'product');
                    $product->productImages()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name']
                    ]);
                }
            }
            // Insert product tags
            if (!empty($request->tags)) {
                foreach ($request->tags as $tagItem) {
                    // insert to tags table => check exist or not to insert new record or get data
                    $tagInstance = $this->tag->firstOrCreate([
                        'name' => $tagItem,
                    ]);
                    $tagId[] = $tagInstance->id; // Due to loop => need define saving variable as a array
                    // insert to product_tags table
                    // $this->productTag->create([
                    //     'product_id' => $product->id,
                    //     'tag_id' => $tagInstance->id,
                    // ]);
                };
                $product->productTags()->attach($tagId);
            }
           
            DB::commit();
            return redirect()->route('products.index');
        }catch (Exception $exception) {
            DB::rollback();
            Log::error('Message:'. $exception->getMessage(). 'Line:' . $exception->getLine());
        }
    }      
}
