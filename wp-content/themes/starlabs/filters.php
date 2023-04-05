<div class="flex justify-end mb-4 " role="group">
  <a href="?filter=newest" id="newest" class="rounded-l-lg border border-gray-200 bg-white dark:bg-[#1c2431] dark:text-white text-sm font-medium px-4 py-2 text-gray-900 hover:bg-gray-200 hover:text-blue-700 dark:hover:bg-gray-700 dark:hover:text-blue-400 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700">
    Newest
  </a>
  <a href="?filter=oldest" id="oldest" class="border border-gray-200 bg-white dark:bg-[#1c2431] dark:text-white text-sm font-medium px-4 py-2 text-gray-900 hover:bg-gray-200 hover:text-blue-700 dark:hover:bg-gray-700 dark:hover:text-blue-400 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700">
    Oldest
  </a>
  <a href="?filter=solved" id="solved" class="border border-gray-200 bg-white dark:bg-[#1c2431] dark:text-white text-sm font-medium px-4 py-2 text-gray-900 hover:bg-gray-200 hover:text-blue-700 dark:hover:bg-gray-700 dark:hover:text-blue-400 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700">
    Solved
  </a>
  <a href="?filter=notsolved" id="notsolved" class="rounded-r-md border border-gray-200 dark:bg-[#1c2431] bg-white dark:text-white text-sm font-medium px-4 py-2 text-gray-900 hover:bg-gray-200 hover:text-blue-700 dark:hover:bg-gray-700 dark:hover:text-blue-400 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700">
    Not Solved
  </a>
        </div>

        <?php
 $filter = isset($_GET['filter']) ? $_GET['filter'] : '';

if ($filter == 'solved') {
    $args['posts_per_page'] = $posts_per_page;
    $args['meta_query'] = array(
        array(
            'key' => 'close',
            'value' => 1,
        ),
    );
} elseif ($filter == 'notsolved') {
    $args['posts_per_page'] = $posts_per_page;
    $args['meta_query'] = array(
        array(
            'key' => 'close',
            'compare' => 'NOT EXISTS',
        ),
    );
} elseif ($filter == 'newest') {
    $args['posts_per_page'] = $posts_per_page;
    $args['orderby'] = 'date';
    $args['order'] = 'DESC';
} elseif ($filter == 'oldest') {
    $args['posts_per_page'] = $posts_per_page;
    $args['orderby'] = 'date';
    $args['order'] = 'ASC';
} else {
    $args['posts_per_page'] = $posts_per_page;
}

$lastBlog = new WP_Query($args);
if ($lastBlog->have_posts()) {
    while ($lastBlog->have_posts()) {
        $lastBlog->the_post();
    }
    wp_reset_postdata();
}
?>

<script>
  const links = document.querySelectorAll("a#newest, a#oldest, a#solved, a#notsolved");
  const selectedLink = sessionStorage.getItem("selectedLink");

  links.forEach((link) => {
    if (selectedLink && link.id === selectedLink) {
      link.classList.add(
        "bg-gray-200",
        "text-black",
        "dark:bg-gray-700",
        "dark:text-blue-400"
      );
    }

    link.addEventListener("click", (e) => {
      e.preventDefault();

      links.forEach((l) => {
        l.classList.remove(
          "bg-gray-200",
          "text-black",
          "dark:bg-gray-700",
          "dark:text-blue-400"
        );
      });

      link.classList.add(
        "bg-gray-200",
        "text-black",
        "dark:bg-gray-700",
        "dark:text-blue-400"
      );

      sessionStorage.setItem("selectedLink", link.id);

      window.location = link.href;
    });
  });
</script>