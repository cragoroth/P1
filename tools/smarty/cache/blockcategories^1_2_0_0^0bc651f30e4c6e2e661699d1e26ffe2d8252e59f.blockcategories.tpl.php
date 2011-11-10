<?php /*%%SmartyHeaderCode:20279665254ebb8bf80ac7b1-77263734%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0bc651f30e4c6e2e661699d1e26ffe2d8252e59f' => 
    array (
      0 => '/home/www/site2/modules/blockcategories/blockcategories.tpl',
      1 => 1306507748,
      2 => 'file',
    ),
    '0357d12f5840991ed7f65212f10a9ef8b14d7d7d' => 
    array (
      0 => '/home/www/site2/modules/blockcategories/category-tree-branch.tpl',
      1 => 1306138304,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20279665254ebb8bf80ac7b1-77263734',
  'has_nocache_code' => false,
  'cache_lifetime' => 3600,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!$no_render) {?>

<!-- Block categories module -->
<div id="categories_block_left" class="block">
	<h4>Cat&eacute;gories</h4>
	<div class="block_content">
		<ul class="tree dhtml">
									
<li >
	<a href="http://site2.ip-formation.local/category.php?id_category=2"  title="Il est temps, pour le meilleur lecteur de musique, de remonter sur scène pour un rappel. Avec le nouvel iPod, le monde est votre scène.">iPods</a>
	</li>
												
<li >
	<a href="http://site2.ip-formation.local/category.php?id_category=3"  title="Tous les accessoires à la mode pour votre iPod">Accessoires</a>
	</li>
												
<li class="last">
	<a href="http://site2.ip-formation.local/category.php?id_category=4"  title="Le tout dernier processeur Intel, un disque dur plus spacieux, de la mémoire à profusion et d&#039;autres nouveautés. Le tout, dans à peine 2,59 cm qui vous libèrent de toute entrave. Les nouveaux portables Mac réunissent les performances, la puissance et la connectivité d&#039;un ordinateur de bureau. Sans la partie bureau.">Portables</a>
	</li>
							</ul>
		<script type="text/javascript">
		// <![CDATA[
			// we hide the tree only if JavaScript is activated
			$('div#categories_block_left ul.dhtml').hide();
		// ]]>
		</script>
	</div>
</div>
<!-- /Block categories module -->
<?php } ?>