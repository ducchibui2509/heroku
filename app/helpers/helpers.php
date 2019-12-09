<?php


if (!function_exists('frontSiteMenu')) {
    function frontSiteMenu($menuName, $type = null, array $options = [])
    {
        return \App\Menu::display($menuName, $type, $options);
    }
}

if (!function_exists('searchPost')) {
    function searchPost($userId, $status , $search)
    {

        $post = DB::table('posts')
            ->when($userId, function ($query, $userId) {
                return $query->where('author_id', $userId);
            })
            ->when($status,
                function ($query, $status) {
                    return $query->where('status', $status);
                },
                function ($query) {
                    return $query->where('status', 'PUBLISHED');
                })
            ->when($search,
                function ($query, $search) {
                    return $query->where(function ($query) use($search) {
                        return $query->where('title', 'like', '%'.$search.'%')
                                    ->orWhere('body', 'like', '%'.$search.'%');
                    }, $search);
                });




        return $post->paginate(15)->appends(['search' => $search]);
    }
}

