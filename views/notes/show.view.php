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
            <input type="hidden" name="id" value="<?= $note['id'] ?>">
            <button type="submit" class="text-red-500">Delete</button>
        </form>
    </div>
</main>

<?php require base_path('views/partials/footer.php'); ?>

