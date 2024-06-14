<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="description" content="Take a Bread" />
	<meta name="keywords" content="HTML5, tags" />
	<meta name="author" content="Nguyen Hong Tay" />
	<link href="style.css" rel="stylesheet" />
	<script src="enquiry.js"></script>
	<title>Want a Bread?</title>

</head>

<body id="product">
	<header>
		<img src="images/logow1.png" id="logo" alt="Bread Logo">
		<?php
			include_once "nav.inc"
		?>
	</header>
	<div id="productbg">
		<h2>OUR SERVICE</h2>
		<section class="product">
			<div class="product_img product1">
				<img id="product1" src="images/product1.jpg" alt="">
			</div>
			<div class="product_quality">
				<div>
					<div class="product_quality_content">
						<h3>Ingredients</h3>
						<p>We use the best ingredients available in market.</p>
						<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Inventore ex iure animi enim est
							obcaecati? Quam unde iusto quas sit quidem maiores molestiae, minus cum? Voluptas laborum
							quaerat veritatis expedita animi aliquid, incidunt totam quia tempore ipsa libero eveniet
							odio repellendus sapiente, dicta illo quas laboriosam exercitationem quod saepe enim
							perferendis. Natus, quia. Praesentium deserunt harum minus eaque aspernatur velit neque ipsa
							ab voluptatibus iusto obcaecati</p>

					</div>
					<aside id="description">
						<h3>100% Australian originated ingredients</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia dolor iusto quisquam ducimus
							consectetur
							eos quam, facere esse vel quis?</p>
					</aside>
				</div>
			</div>
			<div class="product_stat">
				<h3>What We Bake Best For You</h3>
				<p>We can bake any kind of bread, cake in the world.
					Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatibus dolorum quas fugit tenetur
					ipsum iusto, nihil non soluta sapiente id cum, aperiam provident dolor aliquam ducimus, illum earum
					sit ad omnis quidem eligendi! Nemo ea atque, dolorem, quas excepturi optio, ipsum nobis nihil non
					quasi dignissimos beatae neque? Praesentium, expedita.
				</p>
			</div>
			<div class="product_table">
				<h1>Our Customers</h1>
				<table id="product_range">
					<tr>
						<th>Company</th>
						<th>Country</th>
					</tr>
					<tr>
						<td>Alfreds Futterkiste</td>
						<td>Germany</td>
					</tr>
					<tr>
						<td>Berglunds snabbköp</td>
						<td>Sweden</td>
					</tr>
					<tr>
						<td>Centro comercial Moctezuma</td>
						<td>Mexico</td>
					</tr>
					<tr>
						<td>Ernst Handel</td>
						<td>Austria</td>
					</tr>
					<tr>
						<td>Island Trading</td>
						<td>UK</td>
					</tr>
					<tr>
						<td>Königlich Essen</td>
						<td>Germany</td>
					</tr>
					<tr>
						<td>Laughing Bacchus Winecellars</td>
						<td>Canada</td>
					</tr>
				</table>
			</div>
			<div class="product_img">
				<img id="product2" src="images/product2.jpg" alt="">
			</div>
			<div class="product_list" id="product_list1">
				<h3>Our Services</h3>
				<p>We bake at your will. Never have to bake again. We bake, we deliver.</p>
				<ul>
					<li>For you home party</li>
					<li>For your buffet celebration</li>
					<li>For your own Bakery Store</li>
					<li>For your retail store</li>
				</ul>
			</div>
			<div class="product_img">
				<img id="product3" src="images/product3.jpg" alt="">
			</div>
			<div class="product_list" id="product_list2">
				<h3>Steps</h3>
				<p>Finish these steps so we can bake for you</p>
				<ol>
					<li>Provide personal information</li>
					<li>Choose services</li>
					<li>Make payment</li>
					<li>Choose date</li>
				</ol>
			</div>
		</section>

		<section class="bread">
			<h2>OUR BREADS</h2>
			<div class="bread-content">
				<div class="bread-items">
					<img src="images/bread1.png" alt="bread1">
					<h3>Bread basket</h3>
					<p>High quality bread types mix together</p>
					<button>Learn more</button>
				</div>
				<div class="bread-items">
					<img src="images/bread2.png" alt="bread2">
					<h3>French bread</h3>
					<p>For your breakfast Lorem ipsum dolor, sit</p>
					<button>Learn more</button>
				</div>
				<div class="bread-items">
					<img src="images/bread3.png" alt="bread3">
					<h3>Loaf of bread</h3>
					<p>Very big, very full Lorem ipsum dolor sit.</p>
					<button>Learn more</button>
				</div>
				<div class="bread-items">
					<img src="images/bread4.png" alt="bread4">
					<h3>Australian bread</h3>
					<p>Our best seller Lorem ipsum dolor, sit. Lorem</p>
					<button>Learn more</button>
				</div>
			</div>
		</section>
	</div>
	<?php
	include_once "footer.inc"
	?>
</body>

</html>