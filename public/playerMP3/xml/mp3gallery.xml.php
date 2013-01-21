<?php require "../../../bootstrap.php"; ?>
<?php require "../../../class/Music.php"; ?>
<?php $music = new Music($pdo, $session->read('langue')); ?>
<?php header("Content-type: text/xml; charset=utf-8"); ?>
<?php $albums = $music->getAllAlbums(); ?>
<?php $compteur = 1; ?>

<mp3gallery>
	
	<albums startAlbumNo = "">
		
		<!-- if this album tag will not be here, the player will work as usual -->
	<?php foreach($albums as $album): ?>
        <album id="<?php echo $compteur ?>">
			
			<author><![CDATA[<?php echo $album['name']; ?>]]></author>
			
			<image>content/images/albums/<?php echo $album['cover']; ?></image>

			<name alsoInList = "true"><![CDATA[<font color="#6E443D"><?php echo $album['name']; ?></font>]]></name>
			<caption><![CDATA[<?php echo $album['description']; ?>]]></caption>
			
			<link></link><target></target> <!-- to go to a specific page on clicking the image inside the mp3 player -->
			
			<buy price = "" target = ""></buy><!-- if empty, the download button on the album image won't appear -->
			
			<tracks>
			    <?php foreach($music->getMusicsOnAir($album['idAlbums']) as $tracks): ?>
			    <?php if(!empty($tracks['filename'])):?>
			    <item id="<?php echo $compteur+10 ?>">
					<title><![CDATA[<?php echo $tracks['stitle'] ?>]]></title>
					<artist><![CDATA[Passanger]]></artist> <!-- if you want this item to have a different artist(for example featuring artist write the text in this tag -->
					<duration><?php echo $tracks['duration'] ?></duration> <!-- define this only if is the correct duration, otherwise it will make the song to jump incorrectly -->
					
					<buy price = "" url = "" target = ""></buy> <!-- if you want this item to have a different text then the general text, write the text in this tag 
																									 if the url is empty then the button won't appear-->

					<song>content/songs/<?php echo $tracks['filename'] ?></song>
                    
                    <!-- if you want to use RTMP streaming use this "song" tag like below -->
                    <!-- 
                        <song streamer = "rtmp://domain.com/app/">mp3:streamPath</song> 
                    -->
			    </item>
			    <?php endif; ?>
			    <?php endforeach; ?>
											
			</tracks>
		</album>
		<?php $compteur++;?>
		<?php endforeach; ?>
	</albums>	
</mp3gallery>