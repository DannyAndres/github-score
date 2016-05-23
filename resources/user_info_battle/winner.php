<div>
	<?php
	if (!(is_null($json_profile1["login"])) || !(is_null($json_profile2["login"]))) {
		?>
			<div>
				<?php
					if ($final_score>$final_score2) {
						?>
						<img class="winner-user1" src='../resources/img_battle/win.png'>
						<p class="winner-user-text pacifico">
						<?php
						echo $user1;
						?>
						</p>
						<p class="sans winner-user-text-small">Es el ganandor</p>

				<?php }
					elseif ($final_score1==$final_score2) {
						?>
						<p class='winner-user-text pacifico empate'>
							Empate!!!
						</p> 
					
				<?php } 
					else{
						?>
						<img class="winner-user2" src='../resources/img_battle/win.png'>
						<p class="winner-user-text pacifico">
						<?php
						echo $user2;
						?>
						</p>
						<p class="sans winner-user-text-small">Es el ganandor</p>
					 	
				<?php } ?>
			</div>
	<?php } ?>				
</div>