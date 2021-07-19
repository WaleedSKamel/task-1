<?php

namespace App\Helpers;


trait  ApiResponseTrait
{

    public $paginateNumber = 10;

    public function apiResponse($data, $error, $code, $status)
    {

        $array =
            [
                'data' => $data,
                'status' => $status,
                'error' => $error,
            ];

        return response($array, $code);
    }

    public function apiResponseData($data, $paginate, $error, $code,$status)
    {
        $array =
            [
                'data' => $data,
                'paginate' => $paginate,
                'status' => $status,
                'error' => $error,
            ];

        return response($array, $code);
    }

    public function paginator($paginator)
    {
        return [
            'total' => $paginator->total(), // total item return
            'count' => $paginator->count(), // Get the number of items for the current page.
            'currentPage' => $paginator->currentPage(), // Get the current page number.
            'lastPage' => $paginator->lastPage(),  //Get the page number of the last available page. (Not available when using simplePaginate).
            //'firstItem' => $paginator->firstItem(),
            //'getOptions' => $paginator->getOptions(),
            //'hasPages' => $paginator->hasPages(),
            'hasMorePages' => $paginator->hasMorePages(), // Determine if there is more items in the data store.
            //'items' => $paginator->items(),
            //'lastItem' => $paginator->lastItem(),

            'nextPageUrl' => $paginator->nextPageUrl(), // Get the URL for the next page.
            'previousPageUrl' => $paginator->previousPageUrl(), // Get the URL for the previous page.
            //'onFirstPage' => $paginator->onFirstPage(),

            //'getPageName' => $paginator->getPageName(),
        ];
    }


}
