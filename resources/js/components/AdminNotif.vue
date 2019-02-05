<template>
<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="la la-bell"></i>
								<span class="notification">{{suratkeluars.length}}</span>
							</a>
							<ul class="dropdown-menu notif-box" aria-labelledby="navbarDropdown">
								<li>
									<div class="dropdown-title">You have {{suratkeluars.length}} new notification</div>
								</li>
								<li v-for="suratkeluar in suratkeluars">
									<div class="notif-center" v-if="suratkeluar.data['suratkeluar']!==NULL">
										<a href="#">
										<div class="notif-icon notif-primary"> <i class="la la-send-o"></i> </div>
											<div class="notif-content">
												<span class="block">
													<b>(Kepada: {{suratkeluar.data['suratkeluar']['tujuan']}}) Telah Terkirim </b><br />
													{{suratkeluar.data['suratkeluar']['perihal']}} 
												</span> 
												<span class="time">
													{{suratkeluar.data['suratkeluar']['created_at']}}</span> 
											</div>
										</a>
									</div>
									<div class="notif-center" v-else-if="suratkeluar.data['tolak']!==NULL">
										<a href="#">
										<div class="notif-icon notif-danger"> <i class="la la-close"></i> </div>
											<div class="notif-content">
												<span class="block" >
													<b>Surat masuk ditolak</b><br />
													{{suratkeluar.data['tolak']['perihal']}}
												</span>
												<span class="time">{{suratkeluar.data['tolak']['created_at']}}</span>   
											</div>
										</a>
									</div>
											
								</li>
								
								<li v-if="suratkeluars.length!=0">
									<a class="see-all" href="#" v-on:click="markAllAsRead()"> Tandai Semua sebagai Dibaca <i class="la la-angle-right"></i> </a>
								</li>
								<li>
									<a class="see-all" href="#"> <strong>See all notifications</strong> <i class="la la-angle-right"></i> </a>
								</li>
							</ul>
						</li>
</template>

<script>
export default{
	props:['suratkeluars'],
	methods: {
		markAllAsRead:function(){
			axios.post('/admin/markall').then(response=>{
				window.location.href="/admin";
			});
		}
	}
};
</script>