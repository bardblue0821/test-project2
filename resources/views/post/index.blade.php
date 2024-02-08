<html lang="en-US">
  <head>
    <meta charset="utf-8" />
    <title>Dokoiku VR</title>
  </head>
</html>

<meta
  name="index"
  content="index"
/>

<x-app-layout>
    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            @if(session('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
            @endif
            <!-- text - start -->
            <div class="mb-10 md:mb-16">
                <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">{{Auth::user()->name}}さん、どこいく？🤔<br></h2>
                <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">Hi {{Auth::user()->name}}, Where shall we go today?</p>
            </div>
            <!-- text - end -->

            <!-- Search form -->
            <div class="mb-10 md:mb-16">
                <form class="" method="GET" action="{{ route('post.index') }}">
                    <div class="flex mb-8">
                        <div class="flex mx-auto justify-center md:flex md:items-center">
                            <label class="text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                                ワールド名<br>Name
                            </label>
                            <input class="rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" type="search_body" name="search_body" placeholder="検索ワード Query" value="{{request()->search_body}}">
                        
                            <label class="text-gray-500 font-bold md:text-right ml-4 mb-1 md:mb-0 pr-4 ml:40" for="inline-full-name">
                                ワールド分類<br>Category
                            </label>
                            <select class="appearance-none bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" type="search_category" name="search_category">
                                <option value=""></option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}" {{request()->search_category == $category->id ? "selected" : "";}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                        
                            <label class="text-gray-500 font-bold md:text-right ml-4 mb-1 md:mb-0 pr-4" for="inline-full-name">
                                マイセレクト<br>Selection
                            </label>
                        
                            <select class="appearance-none bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" type="search_selection" name="search_selection">
                                <option value=""></option>
                                <option value="wannavisit" {{request()->search_selection == "wannavisit" ? "selected" : "";}}>行きたい！ Wannavisit</option>
                                <option value="visited" {{request()->search_selection == "visited" ? "selected" : "";}}>行ったよ！ Visited</option>
                            </select>
                        </div> 

                    </div>

                    <div class="flex mb-4 mx-auto justify-center md:flex md:items-center">
                        <input type="checkbox" id="ichioshi" name="ichioshi" value="1" {{request()->ichioshi == 1 ? "checked" : ""}}/>
                        <label class="ml-1 mr-2 text-gray-700" for="ichioshi">イチ押し✨</label>
                        <input type="checkbox" id="quest" name="quest" value="1" {{request()->quest == 1 ? "checked" : ""}}/>
                        <label class="ml-1 mr-2 text-gray-700" for="quest">クエスト対応</label>
                    </div>
                    <div class="flex mb-4 mx-auto justify-center md:flex md:items-center">
                        <input type="checkbox" id="pen" name="pen" value="1" {{request()->pen == 1 ? "checked" : ""}}/>
                        <label class="ml-1 mr-2 text-gray-700" for="pen">ペン</label>
                        <input type="checkbox" id="bed" name="bed" value="1" {{request()->bed == 1 ? "checked" : ""}}/>
                        <label class="ml-1 mr-2 text-gray-700" for="bed">ベッド</label>
                        <input type="checkbox" id="vid" name="vid" value="1" {{request()->vid == 1 ? "checked" : ""}}/>
                        <label class="ml-1 mr-2 text-gray-700" for="vid">ビデオ</label>
                        <input type="checkbox" id="jlog" name="jlog" value="1" {{request()->jlog == 1 ? "checked" : ""}}/>
                        <label class="ml-1 mr-2 text-gray-700" for="jlog">ジョインログ</label>
                        <input type="checkbox" id="imgpad" name="imgpad" value="1" {{request()->imgpad == 1 ? "checked" : ""}}/>
                        <label class="ml-1 mr-2 text-gray-700" for="imgpad">イメージパッド</label>
                    </div>
                    <div class="flex mb-8 mx-auto justify-center md:flex md:items-center">
                        <input type="checkbox" id="heavy" name="heavy" value="1" {{request()->heavy == 1 ? "checked" : ""}}/>
                        <label class="ml-1 mr-2 text-gray-700" for="heavy">高負荷</label>
                        <input type="checkbox" id="hardtojoin" name="hardtojoin" value="1" {{request()->hardtojoin == 1 ? "checked" : ""}}/>
                        <label class="ml-1 mr-2 text-gray-700" for="hardtojoin">合流難しい</label>
                        <input type="checkbox" id="jumpscare" name="jumpscare" value="1" {{request()->jumpscare == 1 ? "checked" : ""}}/>
                        <label class="ml-1 mr-2 text-gray-700" for="jumpscare">ジャンプスケア</label>
                        <input type="checkbox" id="violence" name="violence" value="1" {{request()->violence == 1 ? "checked" : ""}}/>
                        <label class="ml-1 mr-2 text-gray-700" for="violence">暴力表現</label>
                        <input type="checkbox" id="sexual" name="sexual" value="1" {{request()->sexsual == 1 ? "checked" : ""}}/>
                        <label class="ml-1 mr-2 text-gray-700" for="sexual">性的表現</label>
                    </div>

                    <div class="flex mb-4">
                        <div class="mx-auto items-center md:flex md:items-center">
                            <button class="mx-4 bg-teal-500 hover:bg-teal-600 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                                検索 Search
                            </button>
                            <a href="{{ route('post.index') }}">
                                <button class="mx-4 bg-gray-400 hover:bg-gray-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                                    クリア Cancel
                                </button>
                            </a>
                        </div>
                    </div>
                </form>

                <div class="flex justify-center">
                    <a href="{{ route('post.create') }}"">
                        <button class="bg-orange-500 hover:bg-orange-600 text-white font-bold mx-4 my-2 py-2 px-5 rounded inline-flex items-center">
                            投稿する Post
                        </button>
                    </a>
                </div>
            </div>
            <!-- Search form end -->

            <div class='py-4'>
                {{$posts->onEachSide(5)->links()}}
            </div>
            <div class="grid gap-4 sm:grid-cols-2 md:gap-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-8">
                @foreach($posts as $post)
                <!-- article - start -->
                    <div class="flex flex-col relative overflow-hidden rounded-lg border bg-white">
                        <div class="relative">
                            <a href="{{route('post.show', $post)}}" class="group relative block h-48 overflow-hidden bg-gray-100 md:h-64">
                                <img src='{{$post->thumbnail}}' loading="lazy" alt="Photo by Minh Pham" class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                            </a>
                            <div class="absolute bottom-0 right-0 mb-2 flex ">
                                @if($post->wanna_visits->count())    
                                    <a href="{{ route('un_wannavisit', $post) }}" class="flex btn btn-success btn-sm">
                                        <button class="bg-red-100 hover:bg-red-200 text-gray-800 font-bold py-1 px-2 rounded inline-flex items-center bg-opacity-80">
                                            <img calss="px-4" src="{{asset('img/wannavisitbutton.png')}}" width="20px">
                                            <span class="badge"> {{ $post->wanna_visits->count() }}</span>    
                                        </button>
                                    </a>
                                @else
                                    <a href="{{ route('wannavisit', $post) }}" class="flex btn btn-secondary btn-sm">
                                        <button class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-bold py-1 px-2 rounded inline-flex items-center bg-opacity-80">
                                            <img src="{{asset('img/un_wannavisitbutton.png')}}" width="20px">
                                            <span class="badge"> {{ $post->wanna_visits->count() }}</span>
                                        </button>
                                    </a>
                                @endif

                                @if($post->visiteds->count())    
                                    <a href="{{ route('un_visited', $post) }}" class="flex btn btn-success btn-sm">
                                        <button class="bg-orange-100 hover:bg-orange-200 text-gray-800 font-bold py-1 px-2 mx-2 rounded inline-flex items-center bg-opacity-80">
                                            <img calss="px-4" src="{{asset('img/visitedbutton.png')}}" width="20px">
                                            <span class="badge"> {{ $post->visiteds->count() }}</span>
                                        </button>
                                    </a>
                                @else
                                    <a href="{{ route('visited', $post) }}" class="flex btn btn-secondary btn-sm">
                                        <button class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-bold py-1 px-2 mx-2 rounded inline-flex items-center bg-opacity-80">
                                            <img src="{{asset('img/un_visitedbutton.png')}}" width="20px">
                                            <span class="badge"> {{ $post->visiteds->count() }}</span>
                                        </button>
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="flex flex-1 flex-col p-4 sm:p-6">
                            <h2 class="mb-2 text-lg font-semibold text-gray-800">
                            <a href="{{route('post.show', $post)}}" class="transition duration-100 hover:text-indigo-500 active:text-indigo-600">{{\Illuminate\Support\Str::limit($post->title, 100, '...')}}</a>
                            </h2>

                            <p class="mb-8 text-gray-500">{{\Illuminate\Support\Str::limit($post->desc, 100, '...')}}</p>

                            <div class="mt-auto flex items-end justify-between">
                                <div class="flex items-center gap-2">
                                    <div class="h-10 w-10 shrink-0 overflow-hidden rounded-full bg-gray-100">
                                        <img src="https://images.unsplash.com/photo-1611898872015-0571a9e38375?auto=format&q=75&fit=crop&w=64" loading="lazy" alt="Photo by Brock Wegner" class="h-full w-full object-cover object-center" />
                                    </div>

                                    <div>
                                        <span class="block text-indigo-500">{{$post->user->name??'Unknown'}}</span>
                                        <span class="block text-sm text-gray-400">{{$post->created_at}}</span>
                                    </div>
                                </div>

                                <span class="rounded border px-2 py-1 text-sm text-gray-500">{{$post->categories->name}}</span>
                            </div>
                        </div>
                    </div>
                <!-- article - end -->
                @endforeach  
            </div>
            <div class='py-4'>
                {{$posts->onEachSide(5)->links()}}
            </div>
        </div>
    </div>    
</x-app-layout>
