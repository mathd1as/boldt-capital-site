<?php
$mainclass = str_replace("/", "-", $attributes['lazyblock']['slug']);
$mainclass .= ' '.$attributes['className'];
$mainclass .= $attributes['align'] ? " align" . $attributes['align'] : '';
echo (!empty($attributes['anchor'])) ? "<a id='" . $attributes['anchor'] . "' name='" . $attributes['anchor'] . "'></a>" : '';
?>

<section class="<?php echo $mainclass ?> mt-5">
	<div class="container">
		<details>
			<summary><?php echo $attributes['lazyblock']['slug'] ?></summary>
			<pre><?php print_r($attributes) ?></pre>
		</details>
	</div>
</section>
