<?php

include "config.php";

/* ================= COMMON IMAGE ================= */

$image = "books.jpg";

/* ================= BOOKS ARRAY ================= */

$books = [

/* ================= NURSERY ================= */

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Nursery","book_name"=>"AKSHAR SAURABH","publisher"=>"CARVAAN","price"=>"190"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Nursery","book_name"=>"ALPHBET AURA","publisher"=>"CARVAAN","price"=>"160"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Nursery","book_name"=>"KIT KAT RHYMES A","publisher"=>"CARVAAN","price"=>"130"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Nursery","book_name"=>"DRAWING BOOK A","publisher"=>"PLANTEX","price"=>"185"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Nursery","book_name"=>"PRINTED COPY 9 P SET","publisher"=>"","price"=>"505"],

/* ================= LKG ================= */

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"LKG","book_name"=>"SHABD SAURABH","publisher"=>"CARVAAN","price"=>"160"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"LKG","book_name"=>"ENGLISH AURA A","publisher"=>"CARVAAN","price"=>"225"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"LKG","book_name"=>"KIT KAT RHYMES B","publisher"=>"CARVAAN","price"=>"130"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"LKG","book_name"=>"DRAWING BOOK B","publisher"=>"PLANTEX","price"=>"185"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"LKG","book_name"=>"PICTURE AURA","publisher"=>"CARVAAN","price"=>"160"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"LKG","book_name"=>"PRINTED COPY 9 P SET","publisher"=>"","price"=>"445"],

/* ================= UKG ================= */

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"UKG","book_name"=>"SWAR SAURABH","publisher"=>"CARVAAN","price"=>"225"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"UKG","book_name"=>"ENGLISH AURA B","publisher"=>"CARVAAN","price"=>"225"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"UKG","book_name"=>"RHYMES C","publisher"=>"CARVAAN","price"=>"130"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"UKG","book_name"=>"DRAWING C","publisher"=>"PLANTEX","price"=>"185"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"UKG","book_name"=>"MATH AURA B","publisher"=>"CARVAAN","price"=>"390"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"UKG","book_name"=>"HINDI SULEKH","publisher"=>"CARVAAN","price"=>"190"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"UKG","book_name"=>"ENGLISH WRITING","publisher"=>"CARVAAN","price"=>"190"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"UKG","book_name"=>"GENERAL KNOWLEDGE","publisher"=>"PRAKASH GLOBAL EXIM","price"=>"120"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"UKG","book_name"=>"BABY TRANSLATION","publisher"=>"GOODMAN","price"=>"15"],

/* ================= CLASS 1 ================= */

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Class 1","book_name"=>"HINDI","publisher"=>"HAPIGO","price"=>"165"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Class 1","book_name"=>"ENGLISH","publisher"=>"HAPIGO","price"=>"145"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Class 1","book_name"=>"MATH","publisher"=>"HAPIGO","price"=>"235"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Class 1","book_name"=>"HINDI VAYAKARAN","publisher"=>"HAPIGO","price"=>"165"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Class 1","book_name"=>"SCIENCE","publisher"=>"JOPHIEL","price"=>"235"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Class 1","book_name"=>"SST","publisher"=>"JOPHIEL","price"=>"235"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Class 1","book_name"=>"G.K","publisher"=>"JOPHIEL","price"=>"160"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Class 1","book_name"=>"ENGLISH GRAMMAR","publisher"=>"HAPIGO","price"=>"145"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Class 1","book_name"=>"ENGLISH TRANSLATION","publisher"=>"LUCENT","price"=>"30"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Class 1","book_name"=>"MORAL","publisher"=>"RAPHEL","price"=>"170"],

/* ================= CLASS 2 ================= */

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Class 2","book_name"=>"HINDI","publisher"=>"HAPIGO","price"=>"185"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Class 2","book_name"=>"ENGLISH","publisher"=>"HAPIGO","price"=>"175"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Class 2","book_name"=>"MATH","publisher"=>"HAPIGO","price"=>"265"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Class 2","book_name"=>"HINDI VAYAKARAN","publisher"=>"HAPIGO","price"=>"185"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Class 2","book_name"=>"SCIENCE","publisher"=>"JOPHIEL","price"=>"265"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Class 2","book_name"=>"SST","publisher"=>"JOPHIEL","price"=>"265"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Class 2","book_name"=>"G.K","publisher"=>"JOPHIEL","price"=>"180"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Class 2","book_name"=>"ENGLISH GRAMMAR","publisher"=>"HAPIGO","price"=>"155"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Class 2","book_name"=>"ENGLISH TRANSLATION","publisher"=>"LUCENT","price"=>"35"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Class 2","book_name"=>"MORAL","publisher"=>"RAPHEL","price"=>"190"],

/* ================= CLASS 3 ================= */

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Class 3","book_name"=>"HINDI","publisher"=>"HAPIGO","price"=>"195"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Class 3","book_name"=>"ENGLISH","publisher"=>"HAPIGO","price"=>"195"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Class 3","book_name"=>"MATH","publisher"=>"HAPIGO","price"=>"275"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Class 3","book_name"=>"HINDI VAYAKARAN","publisher"=>"HAPIGO","price"=>"195"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Class 3","book_name"=>"SCIENCE","publisher"=>"JOPHIEL","price"=>"285"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Class 3","book_name"=>"SST","publisher"=>"JOPHIEL","price"=>"305"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Class 3","book_name"=>"G.K","publisher"=>"JOPHIEL","price"=>"200"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Class 3","book_name"=>"ENGLISH GRAMMAR","publisher"=>"HAPIGO","price"=>"175"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Class 3","book_name"=>"ENGLISH TRANSLATION","publisher"=>"LUCENT","price"=>"40"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Class 3","book_name"=>"MORAL","publisher"=>"RAPHEL","price"=>"210"],

/* ================= CLASS 4 ================= */

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Class 4","book_name"=>"HINDI","publisher"=>"HAPIGO","price"=>"215"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Class 4","book_name"=>"ENGLISH","publisher"=>"HAPIGO","price"=>"195"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Class 4","book_name"=>"MATH","publisher"=>"HAPIGO","price"=>"285"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Class 4","book_name"=>"HINDI VAYAKARAN","publisher"=>"HAPIGO","price"=>"215"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Class 4","book_name"=>"SCIENCE","publisher"=>"JOPHIEL","price"=>"305"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Class 4","book_name"=>"SST","publisher"=>"JOPHIEL","price"=>"310"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Class 4","book_name"=>"G.K","publisher"=>"JOPHIEL","price"=>"220"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Class 4","book_name"=>"ENGLISH GRAMMAR","publisher"=>"HAPIGO","price"=>"185"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Class 4","book_name"=>"ENGLISH TRANSLATION","publisher"=>"LUCENT","price"=>"45"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Class 4","book_name"=>"MORAL","publisher"=>"RAPHEL","price"=>"215"],

/* ================= CLASS 5 ================= */

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Class 5","book_name"=>"HINDI","publisher"=>"HAPIGO","price"=>"225"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Class 5","book_name"=>"ENGLISH","publisher"=>"HAPIGO","price"=>"235"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Class 5","book_name"=>"MATH","publisher"=>"HAPIGO","price"=>"295"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Class 5","book_name"=>"HINDI VAYAKARAN","publisher"=>"HAPIGO","price"=>"245"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Class 5","book_name"=>"SCIENCE","publisher"=>"JOPHIEL","price"=>"310"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Class 5","book_name"=>"SST","publisher"=>"JOPHIEL","price"=>"325"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Class 5","book_name"=>"G.K","publisher"=>"JOPHIEL","price"=>"225"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Class 5","book_name"=>"ENGLISH GRAMMAR","publisher"=>"HAPIGO","price"=>"195"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Class 5","book_name"=>"ENGLISH TRANSLATION","publisher"=>"LUCENT","price"=>"50"],

["school_name"=>"New Sudha Laxmi Pustak Kendra","class_name"=>"Class 5","book_name"=>"MORAL","publisher"=>"RAPHEL","price"=>"230"]

];

/* ================= INSERT ================= */

foreach($books as $book){

$book_name =
mysqli_real_escape_string(
$conn,
$book['book_name']
);

$class_name =
mysqli_real_escape_string(
$conn,
$book['class_name']
);

$check =
mysqli_query(

$conn,

"SELECT * FROM books

WHERE book_name='$book_name'

AND class_name='$class_name'"

);

if(mysqli_num_rows($check) == 0){

mysqli_query(

$conn,

"INSERT INTO books(

school_name,
class_name,
book_name,
publisher,
price,
image

)

VALUES(

'{$book['school_name']}',
'{$book['class_name']}',
'{$book['book_name']}',
'{$book['publisher']}',
'{$book['price']}',
'$image'

)"

);

}

}

?>