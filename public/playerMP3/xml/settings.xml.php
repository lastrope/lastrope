<?php require "../../../bootstrap.php"; ?>
<?php header("Content-type: text/xml; charset=utf-8"); ?>

<mp3gallery width = "" height = "">
	
	<!-- GENERAL SETTINGS -->
	<settings>
		<backgroundColor alpha = "100">0x323232</backgroundColor>
		<marginAround>5</marginAround>
	</settings>
	
	<!-- ALBUMS GALLERY SETTINGS -->
	<albumsgallery width = "" height = "" margin = "10">
		 
		<autoStart floatStep = "1">false</autoStart> <!-- if it should autostart or not if there is a play button set, floatStep is how much should move with the scrub(in pixel)-->
		<autoResize>false</autoResize>
		<keyListener>true</keyListener> <!-- for space(play / pause toggle), f(fullscreen toggle) -->
		 	
		<backgroundColor alpha = "0">0x323232</backgroundColor>
		
		<itemsList marginX = "20" marginY = "20">
			
			<reflections alpha = "" height = "100" distance = "">true</reflections>
			
			<distanceBetweenItems>15</distanceBetweenItems>
			
			<itemWidth>255</itemWidth> <!-- the dimension of the whole item, including the margin -->
			<itemHeight>255</itemHeight> <!-- if the image is smaller after the load the background will be resized -->
			<itemMargin>5</itemMargin>
			<itemNormalAlpha>25</itemNormalAlpha>
			<itemOverAlpha>100</itemOverAlpha>			
			
			<itemsBackground>
				<normalColor>0xC6C6C6</normalColor>
				<overColor>0x6E443D</overColor>
			</itemsBackground>
			
			<itemsText>
				<size>16</size>
				<normalColor>0x42B5E8</normalColor>
				<overColor>0xFFFFFF</overColor>
			</itemsText>
		</itemsList>
		
		<tooltip width = "" height = "">
			<strokeColor>0xDDDDDD</strokeColor>
			<fillColor>0x000000</fillColor>
			<textColor>0xFFFFFF</textColor>
			<textSize>16</textSize>
		</tooltip>
		
		<controller marginAround = "0">
			
			<position>bottom</position> <!-- left, right, top, bottom -->
			
			<autohideTime hideDurationTime = "0.5">3</autohideTime> <!-- if empty, negative or 0 the controller won't autohide after this time-->			
			
			<background>
				<height>35</height>
				<color>0xEEEEEE</color>
				<alpha>100</alpha>
			</background>
			
			<controls>
				<dimension>35</dimension>
				<distanceBetween>0</distanceBetween>
				<strokeColor>-1</strokeColor> <!-- if negative, the controls won't have a stroke -->
				<fillColor>0x6E443D</fillColor> <!-- color of the sign -->
				<normalAlpha>50</normalAlpha>
				<overAlpha>100</overAlpha>
				<overOutTime>0.5</overOutTime>
				
				<disablePrevNextItemBts>true</disablePrevNextItemBts>
				<disableFullBt>false</disableFullBt>
				<disablePlayBt></disablePlayBt>
			</controls>	
			
			<scroller width = "" height = "28"> <!-- this dimensions will be taken in consideration only if no dimensions have been passed to the init function -->
				
				<offset>8</offset> <!-- if is negative then the scrub will be larger with then the track with this offset, it has to be smaller then the half of the total dimension(for example width / 2 in this case) -->
				<isVertical>false</isVertical> <!-- when you want to use the scroller for horizontal text make this to "false" -->
				<updateScrubToContent defaultDimension = "100">false</updateScrubToContent> <!-- if the scrub should resize depending on how large the content is(this way it can be used as a slider), if is false then the slider will have the size equal to the "defaultDimension" attribute -->
				<mouseWheel speed = "2">true</mouseWheel>
				
				<backStrokeColor>-1</backStrokeColor> <!-- if negative, the scroller back won't have a stroke -->
				<backFillColor>0xEEEEEE</backFillColor>
				
				<trackFillColor>0xDDDDDD</trackFillColor>
				<trackStrokeColor>0xBBBBBB</trackStrokeColor>
				
				<scrubFillColor>0x6E443D</scrubFillColor>
				<scrubStrokeColor>-1</scrubStrokeColor> <!-- if negative the stroke will dissapear -->
				<scrubIconColor>-1</scrubIconColor> <!-- if negative that means that the scrub won't have any sign -->
				
				<!-- over and normal alpha for the scrub and arrows bacground -->
				<normalAlpha>50</normalAlpha>
				<overAlpha>100</overAlpha>
				<overOutTime>0.5</overOutTime>
				
				<arrows>
					<position>none</position> <!-- left, right, sides, top, bottom, none - none means that there won't be any arrows -->
					<distanceBetween></distanceBetween>
					
					<moveStep>5</moveStep> <!-- in pixels to move with on one press of an arrow -->
					
					<backColor>0x6E443D</backColor>
					<signColor>0x000000</signColor>
					<signOverColor>0xFFFFFF</signOverColor> 
				</arrows>
				
			</scroller>	
		</controller>
		
	</albumsgallery>
	
	<!-- MP3 PLAYER with playlist SETTINGS -->
	<mp3player width = "" height = "100" distBetweenX = "5"> <!-- distBetweenX is used as distance between artist image and playlist --> 
		
        <textRightToLeft>false</textRightToLeft>
        
		<backImagePath></backImagePath>
		
		<floatTextSpeed>0.2</floatTextSpeed> <!-- with how many pixels the text should float with to left or right -->
	
		<!-- HEADER from the album mp3 player -->
		<header positionX = "" positionY = "" height = "42" marginX = "5" marginY = "1"> <!-- marginX and marginY is for the artist name and the rotator inside the header -->
			
			<backColor>0x323232</backColor>
			
			<artistNameColor>0xFFFFFF</artistNameColor>
			
			<backToAlbumsBt disable = "false">
				
				<text normalColor = "0xFFFFFF" overColor = "0x000000"><?php echo PLAYER_RETURN ?></text>
				
				<backFillColor>0x6E443D</backFillColor>
				<backFillOverColor>0xDDDDDD</backFillOverColor>
				
				<backStrokeColor>0xDDDDDD</backStrokeColor>
				<backStrokeOverColor>0x000000</backStrokeOverColor>
			</backToAlbumsBt>
			
			<rotator disable = "" stayTime = "5"> <!-- stayTime: how much time(seconds) to stay on an item before rotating -->
				<labels color = "0xC83F40">
					<albumLabel>Album:</albumLabel>
					<artistLabel><?php echo PLAYER_ARTIST ?>:</artistLabel>
					<nowPlayingLabel><?php echo PLAYER_TITLE ?>:</nowPlayingLabel>
				</labels>
				
				<texts color = "0xC83F40">
				</texts>				
			</rotator>
		</header>			
		
		<!-- INFO MODULE(artsit image on the left side) settings -->
		<info width = "200" height = "197" border = "5"> <!-- depending on the with, height and border the image will fit inside -->
			<backColor opacity = "100">0x6E443D</backColor> <!-- border color - if opacity is 0 the border will not appear -->	
		
			<!-- prev next album bts settings -->
			<prevNextBts disable = "true">
				<normalAlpha>60</normalAlpha>
				<overAlpha></overAlpha>
				<backColor>0x6E443D</backColor>
				<arrowColor>0xFFFFFF</arrowColor>
			</prevNextBts>
			
			<!-- buy bt settings -->
			<buyAlbumBtText normalColor = "0xffffff" overColor = "0xC83F40">BUY ALBUM</buyAlbumBtText>
			
			<buyAlbumBtFillColor>0x6E443D</buyAlbumBtFillColor>
			<buyAlbumBtFillOverColor>0xDDDDDD</buyAlbumBtFillOverColor>

			<buyAlbumBtStrokeColor>0xFFFFFF</buyAlbumBtStrokeColor>
			<buyAlbumBtStrokeOverColor>0xC83F40</buyAlbumBtStrokeOverColor>			
		</info>
		
		<!-- ALBUM LIST settings -->
		<list height = "195" marginX = "5" marginY = "5"> <!-- marginY: distance between album title, description and list of tracks on Y axis-->
			<backColor opacity = ""></backColor>
		
			<distanceX>5</distanceX> <!-- distance between list and scroller -->
			<distanceY>1</distanceY> <!-- distance between list items on Y -->
			
			<itemDimension>25</itemDimension>
			<itemContentDistX>2</itemContentDistX>
			
			
			<!-- item's inside elements settings -->
			<titleColor over = "0xFFFFFF"></titleColor>
			
			<numberTextColor over = "0xFFFFFF"></numberTextColor>
			<numberBackgroundColor>-1</numberBackgroundColor> <!-- if negative the background will not appear -->
			
			<currency>$</currency>
			<buyBtText normalColor = "0xFFFFFF" overColor = "">Download</buyBtText> <!-- the general text that will appear in all items if they don't have defined a special text -->			
			<buyBtBackgroundColor over = "0xFF0000">0x999999</buyBtBackgroundColor> <!-- if negative the background will not appear -->
			
			<durationTextColor over = "0xFFFFFF"></durationTextColor>
			<durationBackgroundColor>-1</durationBackgroundColor>
			
			<itemFillColor></itemFillColor>
			<itemFillOverColor>0x6E443D</itemFillOverColor>
			<itemStrokeColor>0xDDDDDD</itemStrokeColor> <!-- if nevative the stroke will not appear; this will be used also for the separators -->
			
			
			<!-- scroll settings for the caption and playlist -->
			<scrollDimension>4</scrollDimension>
			<scrollOfsset>0</scrollOfsset>
			<scrollBarColor>0xDDDDDD</scrollBarColor>
			<scrollScrubColor>0x6E443D</scrollScrubColor>			
		</list>
		
        
		<!-- share window settings -->
        <!-- if you want the code to function correctly, 
            please set an absolute path for the pathToFiles component flashvar, like this:
            flashvars.pathToFiles = "http://www.yourwebsite.dom/.../mp3gallery/"
            If you don't set an absolute path for the mp3gallery folder (or the folder that contains the resources this component needs), 
            the component will not function on the user's webpage.
        -->
		<shareWindow verticalDistBetween = "">
			<backColor stroke = "0xDDDDDD" fill = ""></backColor>
			
			<title color = "0x8E001F" dimension = ""><![CDATA[Copy code and include it in your html code:]]></title>
			
			<code color = "0x000000" dimension = "" backFillColor = "" backStrokeColor = "" />
			
			<closeBt marginAround="" backNormalColor = "0x8E001F" backOverColor = "0xFFFFFF" signNormalColor = "0xFFFFFF" signOverColor = "0x8E001F" />
			
			<copyBt backNormalColor = "0x8E001F" backOverColor = "0xFFFFFF" textNormalColor = "0xFFFFFF" textOverColor = "0x8E001F"><![CDATA[]]></copyBt>
		</shareWindow>		
		
		<!-- AUDIO PLAYER settings-->
		<audioplayer width = "" height = "">
		   
			<!-- Playing settings --> 	
			<autoStartPlayer>false</autoStartPlayer>
			<autoPlay>true</autoPlay> <!-- to automatically start playing a video when is loaded inside the player -->
			
			<bufferTime>3</bufferTime>
			<initVolumePercent>50</initVolumePercent>
			
			<!-- background of the player -->
			<backgroundColor opacity = "">0x000000</backgroundColor> 		

			<!-- Controller settings -->
			<controllerBackColor opacity = "" strokeColor = "" fillColor = "0xdddddd" /> <!-- strokeColor - if empty or nevative it will not be there -->
			<controlsDistanceBetween>5</controlsDistanceBetween>
			<controlsDimension>30</controlsDimension>
			
		 	<!-- for the sign of controls and timer text-->
		 	<controlsSignFillColor over = "0x6E443D">0x666666</controlsSignFillColor>
		 	<controlsSignStrokeColor></controlsSignStrokeColor><!-- those who have a stroke in the sign -->
		 	<!-- for the background of the controls -->
		 	<controlsBackFillColor></controlsBackFillColor><!-- if empty or negative it will not be there -->
		 	<controlsBackStrokeColor>0x999999</controlsBackStrokeColor><!-- if empty or negative it will not be there --> 		
			
			
			<!-- PLAING BAR settings -->
			<playBar>
				<backColor opacity = "100"></backColor><!-- if empty or negative it will not be there -->
				
				<barsHeight marginFromBack = "0">8</barsHeight>
			 	<progressBarColor>0x6E443D</progressBarColor>
			 	<downloadBarColor>0x666666</downloadBarColor>
			 	<backBarColor>0x000000</backBarColor>
			 	
			 	<scrubWidth>8</scrubWidth>
			 	<scrubHeight>8</scrubHeight>
			 	<scrubColor>0xFFFFFF</scrubColor>
			</playBar>	
				
			<!-- VOLUME CT settings -->
			<volumeCt disable = "" vertical = "true"> <!-- if vertical you should define barsBackFillColor and barsBackStrokeColor-->
			 	
			 	<dimension></dimension> <!-- if horizontal then it represents height, if vertical it represents width -->
			 	
			 	<backFillColor>0xFF</backFillColor><!-- if empty or negative it will not be there -->
			 	<backStrokeColor></backStrokeColor><!-- if empty or negative it will not be there -->
			 	
			 	<button disable = "">
			 		<fillColor></fillColor>
			 		<strokeColor></strokeColor>
			 		
			 		<signNormalColor>0xFFFFFF</signNormalColor>
			 		<signOverColor>0x00ADEE</signOverColor>
			 		<signOffColor>0x6E443D</signOffColor>
			 	</button>
			 	
				<barsWidth>60</barsWidth><!-- this will be used as height if vertical -->
				<barsHeight>6</barsHeight><!-- this will be used as width if vertical -->	 	
			 	<levelBarColor>0x6E443D</levelBarColor>
			 	<backBarColor>0x666666</backBarColor>
			 	<barsBackFillColor></barsBackFillColor>
			 	<barsBackStrokeColor>0x666666</barsBackStrokeColor>	 	
				
				<scrubWidth>4</scrubWidth><!-- this will be used as height if vertical -->
				<scrubHeight>8</scrubHeight><!-- this will be used as width if vertical -->
				<scrubColor>0xFFFFFF</scrubColor><!-- if negative there will be no scrub -->
			</volumeCt>
			
			<!-- timer settings -->
			<timer textSize = ""> 
				<backStrokeColor></backStrokeColor>
				<backFillColor></backFillColor>
				
				<passedTextColor>0x333333</passedTextColor>
				<totalTextColor>0x333333</totalTextColor>
				<separatorColor>0x333333</separatorColor>
			</timer>
			
			<shuffleBt>true</shuffleBt>
			<embedBt disable="false"></embedBt> <!-- set a value under this tag if 
													you want the button to display text in place of the icon -->
		</audioplayer>			
		
	</mp3player>
	
</mp3gallery>