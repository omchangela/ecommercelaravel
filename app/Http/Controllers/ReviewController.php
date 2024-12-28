<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReviewController extends Controller
{
    public function store(Request $request, $productId)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'rating' => 'required|integer|min:1|max:5',
            'title' => 'required|string',
            'message' => 'required|string',
            'images' => 'nullable|array', // Accept multiple files
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate each image
        ]);

        // Handle multiple image uploads
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('reviews', 'public');
            }
        }

        // Store the review
        Review::create([
            'product_id' => $productId,
            'name' => $request->name,
            'email' => $request->email,
            'rating' => $request->rating,
            'title' => $request->title,
            'message' => $request->message,
            'images' => $imagePaths,
        ]);

        // Update the product's review count and rating
        $product = Product::find($productId);
        $product->increment('review_count');
        $product->rate = Review::where('product_id', $productId)->avg('rating');
        $product->save();

        return back()->with('success', 'Review submitted successfully!');
    }

    public function updateReviewFeedback(Request $request, $reviewId)
    {
        $review = Review::findOrFail($reviewId);
        $action = $request->input('action'); // Expect 'like', 'dislike', 'remove-like', 'remove-dislike'
    
        if (!$action) {
            return response()->json(['error' => 'Action is required'], 400);
        }
    
        switch ($action) {
            case 'like':
                $review->increment('helpful_count');
                break;
            case 'dislike':
                $review->increment('not_helpful_count');
                break;
            case 'remove-like':
                if ($review->helpful_count > 0) {
                    $review->decrement('helpful_count');
                }
                break;
            case 'remove-dislike':
                if ($review->not_helpful_count > 0) {
                    $review->decrement('not_helpful_count');
                }
                break;
            default:
                return response()->json(['error' => 'Invalid action'], 400);
        }
    
        $review->save();
    
        return response()->json([
            'helpful_count' => $review->helpful_count,
            'not_helpful_count' => $review->not_helpful_count
        ]);
    }
    
    public function like($id)
{
    $review = Review::findOrFail($id);
    $review->helpful_count = $review->helpful_count + 1;
    $review->save();

    return response()->json(['newHelpfulCount' => $review->helpful_count]);
}

public function dislike($id)
{
    $review = Review::findOrFail($id);
    $review->not_helpful_count = $review->not_helpful_count + 1;
    $review->save();

    return response()->json(['newNotHelpfulCount' => $review->not_helpful_count]);
}


    public function showReviews($productId)
    {
        $product = Product::findOrFail($productId);
        $reviews = $product->reviews()->orderBy('created_at', 'desc')->take(5)->get(); // Order by latest and limit to 5

        return view('website.productdetails', compact('product', 'reviews'));
    }
}
