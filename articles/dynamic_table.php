<!DOCTYPE html>
<html>
<head>
	<?php
		require_once("../php/mainCSS.php");
		require_once("../php/articleCSS_JS.php");
	?>
	<title>Dynamic Table</title>
</head>
<body>
	<?php
		require_once("../php/social/fbJS.php");
		require_once("../php/header.php");
		require_once("../php/nav.php");
	?>

	<div class="banner" style="background-image: url(http://learncodeart.com/_images/patterns/subway-lines.png);"></div>

	<article class="main">

		<nav class="outline float">
			<section>
				<h2>Outline</h2>
				<ul>
					<a href="#theProject"><li>The Project</li></a>
					<a href="#theFinalResult"><li>The Final Result</li></a>
					<a href="#theCode"><li>The Code</li></a>
					<a href="#theMakingOf"><li>The Making Of</li></a>
					<ul>
						<a href="#step1"><li>HTML</li></a>
						<a href="#step2"><li>JavaScript</li></a>
					</ul>
					<a href="#conclusion"><li>Conclusion</li></a>
					<a href="#notes"><li>Notes</li></a>
					<a href="#disqus_thread"><li>Comments</li></a>
				</ul>
			</section>
		</nav>

		<div class="content">

			<header>
				<h1>Creating a Dynamically Sized Table with JavaScript</h1>
				<p><time pubdate datetime="2014-01-09">Created on: January 9, 2014</time></p>
				<section class="social">
					<?php
						include("../php/social/fbLike.php");
						include("../php/social/twitter.php");
					?>
				</section>
			</header>

			<section id="theProject">
				<header>
					<h2>The Project</h2>
					<a href="#theProject"><img src="http://learncodeart.com/_images/link20.png"></a>
					<a class="toTop" href="#"><img src="http://learncodeart.com/_images/toTop.png"></a>
				</header>
			
				<p>
					The last article that was posted explained the entire process for creating a snake game using JavaScript. Upon some reflection I realized that writing up such a big project in one article might have being a bad idea. There is too much content and it is hard to follow. After some thought, I have decided to break the project into smaller pieces and post how each of the individual pieces where created. This will result in a much more modular design for my blog, and will make it easier to navigate through the project. Once all of the parts of the project have being explained I will create a blog post that pulls in everything together by just referencing the previous posts. With that said, let’s jump in.
				</p>
				
				<p>
					The first step for creating a snake game is to create the board that the game will take place in. To make it a little bit more interesting the user will be allowed to select the size of the table that is going to be generated. For now we will not worry about the formatting of the table or how it looks. The focus is just on generating a dynamically sized table.
				</p>
			</section>

			<section id="theFinalResult">
				<header>
					<h2>The Final Result</h2>
					<a href="#theFinalResult"><img src="http://learncodeart.com/_images/link20.png"></a>
					<a class="toTop" href="#"><img src="http://learncodeart.com/_images/toTop.png"></a>
				</header>
		
				<p>
					This is what the final result looks like:
				</p>
				
				<img class="image" src="http://learncodeart.com/projects/dynamic_table/screenshot.png" alt="Screen shot of final result">
				
				<p>
					To play with it yourself you can go to this link:
				</p>

				<p>
					<a href="http://learncodeart.com/projects/dynamic_table/table.html">http://learncodeart.com/projects/dynamic_table/table.html</a>
				</p>
			</section>

			<section id="theCode">
				<header>
					<h2>The Code</h2>
					<a href="#theCode"><img src="http://learncodeart.com/_images/link20.png"></a>
					<a class="toTop" href="#"><img src="http://learncodeart.com/_images/toTop.png"></a>
				</header>
		
				<p>
					You can see the complete source code by clicking on the following links.
				<br>
				<br>
					<a title="table.html" href="http://learncodeart.com/projects/dynamic_table/table.html" target="_blank">
						HTML - table.html
					</a><br>
					
					<a title="main.css" href="http://learncodeart.com/projects/dynamic_table/css/main.css" target="_blank">
						CSS - main.css
					</a><br>
					
					<a title="table.js" href="http://learncodeart.com/projects/dynamic_table/js/table.js" target="_blank">
						JavaScript - table.js
					</a><br>
				</p>
			</section>

			<section id="theMakingOf">
				<header>
					<h2>The Making Of</h2>
					<a href="#theMakingOf"><img src="http://learncodeart.com/_images/link20.png"></a>
					<a class="toTop" href="#"><img src="http://learncodeart.com/_images/toTop.png"></a>
				</header>

				<section id="step1">
					<header>
						<h3>Step 1 - HTML</h3>
					</header>
			
					<p>
						First we create a simple HTML structure to hold the table. The only things needed are an input field for the user to write the size of the table, a label for the input field, a header for our page, and a button to trigger the creation of the table. Also, the HTML file needs to include a jQuery library, a link to the CSS style sheet, and a link to the JavaScript file that creates the table. This is what the HTML document looks like.
					</p>
					
					<pre><?php include("http://learncodeart.com/_code/dynamic_table_1.php") ?></pre>
				</section>

				<section id="step2">
					<header>
						<h3>Step 2 - JavaScript</h3>
					</header>
			
					<p>
						With the HTML done we can start writing the JavaScript part of the dynamic table. These are the things that the JavaScript file needs to do: add an event listeners to the button element, create a variable that will store the size of the table, create functions that will automatically generate a table inside of the body element.
					</p>
					
					<p>
						Lets start by declaring a <strong>size</strong> variable that will hold the size of the table. Next we add a <strong>ready</strong> function that will add functionality to the button once the DOM is loaded. Inside of the ready function we add an event listener to the button element that calls a function that we will name <strong>createTable</strong>. This function is that one that will actually build the entire table and create all the rows and columns inside of the table.	
					</p>
					
					<pre><?php include("http://learncodeart.com/_code/dynamic_table_2.php") ?></pre>

					<p>
						Now lets implement the <strong>createTable</strong> function. This function first has to get the size of the table. We will accomplish this by using the <em>val()</em> function of the jQuery. Then the size must be validated (In this case there is an arbitrary minimum size of 5). When the table size is validated we proceed to creating the table elements. Before doing this however, any existing table must be removed to avoid having more than one table on the page. Therefore we will create two other functions. One called <strong>createTableElements</strong> that will manage the creation of all the elements inside of the table and the table itself. The second function will be called <strong>clearTable</strong> which simply removes any table inside of the body tags.
					</p>
			
					<pre><?php include("http://learncodeart.com/_code/dynamic_table_3.php") ?></pre>
			
					<p>
						To implement the <strong>createTableElements</strong> function we will use jQuery to make things a little easier. The things we need to create for the table are the following: A <em>div</em> element to hold the table, a <em>table</em> element that will hold the actual table, a <em>thead</em> elment that holds the header row for the table, and finally a <em>tbody</em> element that holds all the rows and cells of the table. When these elements have being created, the next step is to populate the <em>thead</em> and <em>tbody</em> elements. This will be delegated to two other functions called <strong>createTableHeader</strong> and <strong>createTableBody</strong> respectively. 
					</p>
					
					<pre><?php include("http://learncodeart.com/_code/dynamic_table_4.php") ?></pre>
			
					<p>
						The easiest way to populate a variable size table is of course by using <em>for loops</em>. Populating the table header is easier so lets start with that. Inside of the <em>createTableHeader</em> function we first add a new <em>tr</em> element inside of the <em>thead</em> element. This is the table row where each of the header cells will go. Next we get a pointer to the <em>tr</em> element object inside of the <em>thead</em> element. The <em>tr</em> object will then be used inside of the for loop to add all of the <em>th</em> elements. The inside of the for loop just adds <em>th</em> elements until the table size is reached. This will result in one header for each column of the table.
					</p>
					
					<pre><?php include("http://learncodeart.com/_code/dynamic_table_5.php") ?></pre>
			
					<p>
						Next is the implementation of the <em>createTableBody</em> function. This function is similar to the <em>createTableHeader</em> function. The main difference is that the <em>createTableBody</em> function has one nested for loop inside of the main for loop. In the first level of the for lop a new <em>tr</em> element is created, and the a pointer to the newly created <em>tr</em> element object is obtained. The second level of the for loop adds all the <em>td</em> elements for each row. This will create a fully populated body for the table.
					</p>
					
					<pre><?php include("http://learncodeart.com/_code/dynamic_table_6.php") ?></pre>
			
					<p>
						We have now implemented all the functions needed to generate a table inside of the body tag of the HTML document. The last remaining step is to implement the <strong>clearTable</strong> function which is very straightforward. This function first needs to get a pointer to the <em>div</em> element that contains the table. Next we verify if this pointer is valid. If the pointer is not valid it means that the table doesn’t exist and there is nothing to do. If the pointer is valid, it means that there is an existing table. In this case all that needs to be done is to remove the <em>div</em> container by using the <em>remov()</em> function of the jQuery library.
					</p>
					
					<pre><?php include("http://learncodeart.com/_code/dynamic_table_7.php") ?></pre>
			
					<p>
						This function concludes the dynamically sized table project. When the page is loaded the text input will be read to determine the size of the table, and when the button is pressed a new table will be created with the specified size. If the button is clicked on again, the old table will be removed and new one will take its place.
					</p>
				</section>

			</section>

			<section id="conclusion">	
				<header>
					<h2>Conclusion</h2>
					<a href="#conclusion"><img src="http://learncodeart.com/_images/link20.png"></a>
					<a class="toTop" href="#"><img src="http://learncodeart.com/_images/toTop.png"></a>
				</header>
		
				<p>
					To reiterate this project was created because it was the first step to creating an in browser snake game. The dynamically size table will then be used as the game board where the game will be played on. Later on some more features will be added to the table that will serve as a way to identify each row and make it easier to get a pointer to a table cell element and also properties will be added that will help determine if there is a snake node on any given table cell.
				</p>
			</section>

			<section id="notes">
				<header>
					<h2>Notes</h2>
					<a href="#notes"><img src="http://learncodeart.com/_images/link20.png"></a>
					<a class="toTop" href="#"><img src="http://learncodeart.com/_images/toTop.png"></a>
				</header>
		
				<p>
					The source code for this project includes a CSS files. However, in the instructions of how to make this project there is not mention of the file. This was intentional. The focus of the project is on the JavaScript, and so there is no need to discuss the styling of the table. The CSS file was included just to make the table a little more appealing. However, this styling will be removed in later articles.
				</p>
			</section>

			<section class="social">
				<?php
					include("../php/social/fbLike.php");
					include("../php/social/twitter.php");
				?>
			</section>
			
			<footer>
				<p>
					Written by: Elmer Landaverde (elmerlandaverde@gmail.com)<br>
					Las updated: January 25, 2014<br>
					<a title="Nerdfighters" href="http://nerdfighters.ning.com/" target="_blank">DFTBA!</a>
				</p>
			</footer>
			<?php require_once("../php/disqus.php"); ?>
		</div>
	</article>
</body>
</html>
