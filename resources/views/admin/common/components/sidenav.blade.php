<div class="sidenav">
    <div class="sidenav-header">
        <a href="" class="logo">
            <div class="img">
                <img src="{{asset('assets/admin/img/logo-small.png')}}" alt="">
            </div>
            <div class="title">
                RBS.CMS
                <span>{{$site_info['template_version']}}</span>
            </div>
        </a>
    </div>
    <div class="sidenav-title">
        <div class="title" title="">{{$site_info['title']}}</div>
        <div class="descr">admin-panel</div>
    </div>
    <div class="sidenav-menu">
        <ul class="sidenav-menu-parents">
            @foreach($navigation as $navparent)
                <?php $_haschild = !empty($navparent['items']) ? true : false;?>
                <li>
                    <a href="<?=!empty($navparent['link']) ? url('admin/' . $navparent['link']) : 'javascript:void(0)';?>"
                       class="sidenav-menu-parent" <?=$navparent['alias'] == 'files' ? 'target="_blank"' : null;?>>
						<span class="icon">
							<i class="fa5 <?=$navparent['icon'];?> fa-fw"></i>
						</span>
                        <span class="title">
							<?=$navparent['name'];?>
                            @if($_haschild)
                                <span class="toggle"><?=fa5s('angle-right');?></span>
                            @endif
						</span>
                    </a>
                    @if($_haschild)
                        <ul class="sidenav-menu-childs">
                            @foreach($navparent['items'] as $navchild)
                                <li>
                                    <a href="<?=!empty($navchild['link']) ? url('admin/' . $navchild['link']) : 'javascript:void(0)';?>"
                                       class="sidenav-menu-child">
                                        <?=$navchild['name'];?>
                                    </a>
                                    @if(!empty($admin_bells[$navchild['alias']]['count']) and $admin_bells[$navchild['alias']]['count'] != 0)
                                        <span
                                            class="sidenav-menu-count label-<?=$admin_bells[$navchild['alias']]['color'];?>">
								<?=$admin_bells[$navchild['alias']]['count'] < 100 ? $admin_bells[$navchild['alias']]['count'] : '99+';?>
						            	</span>
                                    @endif
                                    @if($navchild['create_btn'] == 1)
                                        <a href="<?=url('admin/' . $navchild['link'] . '/create');?>"
                                           class="sidenav-menu-create">
                                            <?=fa5s('plus');?>
                                        </a>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
    <div class="sidenav-footer">
        2014-<?=date('Y');?> &copy; Powered by ROMKA
    </div>
</div>
