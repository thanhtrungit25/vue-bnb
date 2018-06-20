<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listing;

class ListingController extends Controller
{
	private function get_listing($listing)
	{
		$model = $listing->toArray();
		for ($i = 1; $i <= 4; $i++)  {
			$model['image_' . $i] = asset(
				'images/' . $listing->id . '/Image_' . $i . '.jpg'
			);
		}
		return collect(['listing' => $model]);
	}
	public function get_listing_api(Listing $listing)
	{
		$data = $this->get_listing($listing);
		return response()->json($data);
	}
	private function get_meta_data($collection, $request)
	{
		return $collection->merge([
			'path' => $request->getPathInfo()
		]);
	}
	public function get_listing_web(Listing $listing, Request $request)
	{
		$data = $this->get_listing($listing);
		$data = $this->get_meta_data($data, $request);
		return view('app', ['data' => $data]);
	}
	public function get_home_web(Request $request)
	{
		$collection = Listing::all(['id', 'address', 'title', 'price_per_night']);
		$collection->transform(function($listing) {
			$listing->thumb = asset(
				'images/' . $listing->id . '/Image_1_thumb.jpg'
			);
			return $listing;
		});

		$data = collect(['listings' => $collection->toArray()]);
		$data = $this->get_meta_data($data, $request);

		return view('app', ['data' => $data]);
	}
}
