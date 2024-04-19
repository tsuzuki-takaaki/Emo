<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>TOP</title>
        <link href="https://cdn.jsdelivr.net/npm/daisyui@4.6.1/dist/full.css" rel="stylesheet" type="text/css">
        <script src="https://cdn.tailwindcss.com/3.4.1"></script>
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
            <img src="/resources/images/top.svg" class="w-full" />
            <main class="pb-52 min-h-[calc(100vh-6.006rem)] mx-4 mt-4">
                <a href="/question/new" class="fixed right-[calc(50vw-225px+16px)] bottom-4 z-10 w-24"><img src="/resources/images/global_button.svg"></a>
                <h3 class="text-2xl font-bold">記事一覧</h3>
                <nav class="mt-1">
                    <ul class="flex gap-[15px] justify-between text-babyglay py-2">
                        <?php foreach ($tags as $tag) { ?>
                            <li><a href=<?php print "?tag_id=" . $tag["id"]; ?> class="focus:underline focus:decoration-babypink focus:decoration-[0.2em] focus:underline-offset-[0.4em] focus:text-babyblack focus:font-bold"><?php print $tag["name"]; ?></a></li>
                        <?php } ?>
                    </ul>
                </nav>
                <div class="flex flex-col gap-4">
                    <?php foreach($articles as $article) { ?>
                        <a href=<?php print "/article/" . $article["article"]["id"]; ?>>
                            <div class="mt-2">
                                <img src="<?php print $article["article"]["image_path"] ?>" class="w-full rounded-3xl" />
                                <ul class="flex g-2 text-babypink mt-2">
                                    <?php foreach($article["tags"] as $tag) { ?>
                                        <li class="bg-babyhoppe px-2 rounded-full text-xs"><?php print "#" . $tag["name"]; ?></li>
                                    <?php } ?>
                                </ul>
                                <section>
                                    <h1 class="font-bold mt-1">
                                        <?php print $article["article"]["title"]; ?>
                                    </h1>
                                    <p class="text-[10px] mt-1 text-babyglay">
                                        <?php print $article["article"]["content"]; ?>
                                    </p>
                                </section>
                            </div>
                        </a>
                    <?php } ?>
                </div>
            </main>
            <footer class="absolute bottom-0 w-full footer footer-center h-6 bg-babypink">
                <span class="mx-4 text-white text-[10px]">© 2024 Ateam LifeDesign Inc.</span>
            </footer>
        </div>
    </body>
</html>
