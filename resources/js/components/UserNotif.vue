<template>
<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="la la-bell"></i>
								<span class="notification">{{approves.length}}</span>
							</a>
							<ul class="dropdown-menu notif-box" aria-labelledby="navbarDropdown">
								<li>
									<div class="dropdown-title">You have {{approves.length}} new notification</div>
								</li>
								<li v-for="approve in approves">
									<div class="notif-center">
										<a href="#">
											<div class="notif-icon notif-primary"> <i class="la la-envelope"></i> </div>
											<div class="notif-content" v-if="approve.data['approve']!==NULL">
												<span class="block">
													{{approve.data['approve']['asal_surat']}}
												</span> 
												<span class="time">
													{{approve.data['approve']['created_at']}}</span> 
											</div>
											<div class="notif-content" v-else-if="approve.data['disposisi']!==NULL">
												<span class="block" >
													Disposisi masuk baru dari kepala kantor
												</span>
												<span class="time">{{approve.data['disposisi']['created_at']}}</span>  
											</div>
										</a>
									</div>
								</li>
								

								<li>
									<a class="see-all" href="#"> <strong>See all notifications</strong> <i class="la la-angle-right"></i> </a>
								</li>
							</ul>
						</li>
</template>

<script>
export default{
	props:['approves'],
	
};
</script>