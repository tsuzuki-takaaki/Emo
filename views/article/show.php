<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>SHOW</title>
        <link href="https://cdn.jsdelivr.net/npm/daisyui@4.10.2/dist/full.css" rel="stylesheet" type="text/css">
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="/style.css" rel="stylesheet" type="text/css"/>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            babyblack: "#352E30",
                            littleglay: "#73696C",
                            babyglay: "#C1C1C1",
                            babypink: "#FF6D99",
                            babysakura: "#FFD1DF",
                            babyhoppe: "#FFF0F4",
                            kusumibaby: "#E8527F",
                        }
                    }
                }
            }
        </script>
    </head>
    <body class="bg-babyhoppe">
        <div class="relative max-w-[450px] m-auto min-h-screen bg-white">
            <header class="shadow">
                <div class="mx-4">
                    <nav class="navbar h-12">
                        <div class="flex-1">
                            <div class="cursor-pointer">
                                <img src="/resources/images/logo.svg" class="w-full" />
                            </div>
                        </div>
                        <div class="flex-none">
                            <div class="dropdown dropdown-end">
                                <button class="btn btn-sm btn-ghost btn-circle !bg-babyhoppe focus:!bg-babysakura hover:!bg-babysakura">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-babypink" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                                    </svg>
                                </button>
                                <ul tabindex="0" class="menu dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                                    <li><a href="/" class="font-bold focus:!bg-babyhoppe hover:!bg-babyhoppe !text-babypink">TOP</a></li>
                                    <li><a href="/question" class="font-bold focus:!bg-babyhoppe hover:!bg-babyhoppe !text-babypink">質問一覧</a></li>
                                    <li><a href="/question/new" class="font-bold focus:!bg-babyhoppe hover:!bg-babyhoppe !text-babypink">質問する</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </header>
            <main class="pb-52 min-h-[calc(100vh-6.006rem)] mx-4 mt-4">
                <div>
                    <img src="<?php print $article->image_path ?>" class="w-full" />
                </div>
                <ul class="flex g-2 text-babypink mt-2 gap-1">
<?php
    if ($tags) {
        foreach ($tags as $tag) {
?>
                    <li class="bg-babyhoppe px-2 rounded-full text-xs">#<?php print htmlspecialchars($tag->name, ENT_QUOTES, "UTF-8"); ?></li>
<?php
        }
    }
?>
                </ul>
                <section>
                    <h1 class="font-bold text-[26px] underline decoration-[0.4em] decoration-babysakura underline-offset-[-0.15em] my-1.5">
                        <?php print htmlspecialchars($article->title, ENT_QUOTES, "UTF-8"); ?>
                    </h1>
                    <p class="text-sm leading-6 mt-1"><?php print htmlspecialchars($article->content, ENT_QUOTES, "UTF-8"); ?></p>
                </section>
                <div>

<?php
    if ($affiliates) {
        foreach ($affiliates as $affiliate) {
?>
                    <div class="mt-4">
                        <img src="<?php print $affiliate->image_path ?>" class="w-full" />
                        <p class="text-xs text-littlegray mt-[4px] text-[12px] text-littleglay"><?php print htmlspecialchars($affiliate->brand_name, ENT_QUOTES, "UTF-8"); ?></p>
                        <section>
                            <h1 class="font-bold">
                                <?php print htmlspecialchars($affiliate->brand_name, ENT_QUOTES, "UTF-8"); ?> | <?php print htmlspecialchars($affiliate->name, ENT_QUOTES, "UTF-8"); ?>
                            </h1>
                            <div class="flex text-babypink items-center g-1 mt-1">
                                <p class="border border-babypink rounded p-1 text-sm inline-block">参考価格</p>
                                <!-- priceに「,」つけたい-->
                                <p class="ml-1 font-bold"><?php print htmlspecialchars($affiliate->price, ENT_QUOTES, "UTF-8"); ?>円</p>
                            </div>
                            <p class="text-sm leading-6 mt-2"><?php print htmlspecialchars($affiliate->description, ENT_QUOTES, "UTF-8"); ?></p>
                            <div class="my-4"><a href="#" class="btn btn-lg w-full py-4 !rounded-full !border-none !bg-babypink !text-white focus:!bg-kusumibaby hover:!bg-kusumibaby">この商品を購入する</a></div>
                        </section>
                    </div>
<?php
        }
    }
?>
                </div>
            </main>

            <footer class="absolute bottom-0 w-full footer footer-center h-6 bg-babypink">
                <span class="mx-4 text-white text-[10px]">© 2024 Ateam LifeDesign Inc.</span>
            </footer>
        </div>
    </body>
</html>
