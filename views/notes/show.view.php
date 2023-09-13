<?php require base_path('views/partials/header.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>


<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <p class="text-blue-500 underline mt-4">
            <a href="/notes" >Go Back...</a>
        </p>
        <div class="mt-5">
            <h1 class="text-2xl font-bold"><?= $note['title'] ?></h1>
            <div class="block w-full mt-6 border-0 py-2 pl-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300">
                <p class="text-m"><?= $note['description'] ?></p>
            </div>
        </div>
        <form class="mt-5" method="POST">
            <div class="mt-6 flex items-center justify-start gap-x-6">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="id" value="<?= $note['id'] ?>">
                <button type="submit" class="rounded-md bg-red-400 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Delete</button>
            </div>
        </form>
    </div>
</main>

<?php require base_path('views/partials/footer.php'); ?>

