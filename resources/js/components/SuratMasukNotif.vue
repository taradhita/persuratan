<template>
<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="la la-bell"></i>
								<span class="notification">{{suratmasuks.length}}</span>
							</a>
							<ul class="dropdown-menu notif-box" aria-labelledby="navbarDropdown">
								<li>
									<div class="dropdown-title">You have {{suratmasuks.length}} new notification</div>
								</li>
								<li v-for="suratmasuk in suratmasuks">
									<div class="notif-center">
										<a href="#">
											<div class="notif-icon notif-primary"> <i class="la la-user-plus"></i> </div>
											<div class="notif-content">
												<span class="block">
													{{suratmasuk.data['suratmasuk']['asal_surat']}} mengirim surat masuk 
												</span>
												<span class="time">{{suratmasuk.data['suratmasuk']['created_at']}} </span> 
											</div>
										</a>
									</div>
								</li>
								
								<li>
									<a class="see-all" href="javascript:void(0);"> <strong>See all notifications</strong> <i class="la la-angle-right"></i> </a>
								</li>
							</ul>
						</li>
</template>

<script>
export default{
	props:['suratmasuks'],
};
</script>