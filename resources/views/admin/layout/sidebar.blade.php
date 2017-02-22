<!-- ================================================
                ================= SIDEBAR Content ===================
                ================================================= -->
                <?php
                  $menus = array(
                    array(
                      "text" => "首页",
                      "url" => "",
                      "class" => "fa-dashboard",
                      "sub_menu" => array()
                    ),
                    array(
                      "text" => "课程管理",
                      "url" => "",
                      "class" => "fa-pencil",
                      "sub_menu" => array(
                        array(
                          "text" => "课程列表",
                          "url" => "",
                          "sub_menu" => array()
                        ),
                        array(
                          "text" => "添加课程",
                          "url" => "",
                          "sub_menu" => array(
                            array(
                              "text" => "文章",
                              "url" => "",
                              "sub_menu" => array()
                            ),
                            array(
                              "text" => "影片",
                              "url" => "",
                              "sub_menu" => array()
                            )
                          )
                        ),
                        array(
                          "text" => "修改课程",
                          "url" => "",
                          "sub_menu" => array()
                        ),
                        array(
                          "text" => "删除课程",
                          "url" => "",
                          "sub_menu" => array()
                        ),
                      )
                    ),
                    array(
                      "text" => "教师管理",
                      "url" => "",
                      "class" => " fa-file-text",
                      "sub_menu" => array(
                        array(
                          "text" => "教师列表",
                          "url" => "",
                          "sub_menu" => array()
                        ),
                        array(
                          "text" => "添加教师",
                          "url" => "",
                          "sub_menu" => array()
                        ),
                        array(
                          "text" => "修改教师",
                          "url" => "",
                          "sub_menu" => array()
                        ),
                        array(
                          "text" => "删除教师",
                          "url" => "",
                          "sub_menu" => array()
                        )
                      )
                    ),
                    array(
                      "text" => "课后活动管理",
                      "url" => "",
                      "class" => "fa-shopping-cart",
                      "sub_menu" => array(
                        array(
                          "text" => "活动列表",
                          "url" => "",
                          "sub_menu" => array()
                        ),
                        array(
                          "text" => "添加活动",
                          "url" => "",
                          "sub_menu" => array()
                        ),
                        array(
                          "text" => "修改活动",
                          "url" => "",
                          "sub_menu" => array()
                        ),
                        array(
                          "text" => "删除活动",
                          "url" => "",
                          "sub_menu" => array()
                        )
                      )
                    ),
                    
                    array(
                      "text" => "页面管理",
                      "url" => "",
                      "class" => "fa-delicious",
                      "sub_menu" => array(
                        array(
                          "text" => "首页",
                          "url" => "",
                          "sub_menu" => array()
                        ),
                        array(
                          "text" => "课程",
                          "url" => "",
                          "sub_menu" => array()
                        ),
                        array(
                          "text" => "教师",
                          "url" => "",
                          "sub_menu" => array()
                        ),
                        array(
                          "text" => "课后活动",
                          "url" => "",
                          "sub_menu" => array()
                        ),
                        array(
                          "text" => "课后聊",
                          "url" => "",
                          "sub_menu" => array()
                        ),
                        array(
                          "text" => "个人中心",
                          "url" => "",
                          "sub_menu" => array()
                        ),
                        array(
                          "text" => "关于我们",
                          "url" => "",
                          "sub_menu" => array()
                        ),
                        array(
                          "text" => "联系我们",
                          "url" => "",
                          "sub_menu" => array()
                        )
                      )
                    ),
                    array(
                      "text" => "会员管理",
                      "url" => "",
                      "class" => "fa-desktop",
                      "sub_menu" => array(
                        array(
                          "text" => "会员列表",
                          "url" => "/admin/member",
                          "sub_menu" => array()
                        ),
                        array(
                          "text" => "添加会员",
                          "url" => "/admin/member/create",
                          "sub_menu" => array()
                        ),
                        array(
                          "text" => "资金管理",
                          "url" => "",
                          "sub_menu" => array()
                        )
                      )
                    ),
                    array(
                      "text" => "权限管理",
                      "url" => "",
                      "class" => "fa-file-o",
                      "sub_menu" => array(
                        array(
                          "text" => "管理员列表",
                          "url" => "/admin/system/user",
                          "sub_menu" => array()
                        ),
                        array(
                          "text" => "角色管理",
                          "url" => "/admin/system/role",
                          "sub_menu" => array()
                        ),
                        array(
                          "text" => "权限管理",
                          "url" => "/admin/system/permission",
                          "sub_menu" => array()
                        ),
                        array(
                          "text" => "管理员日志",
                          "url" => "",
                          "sub_menu" => array()
                        )
                      )
                    )
                  );  
                ?>
                <aside id="sidebar">
                    <div id="sidebar-wrap">
                        <div class="panel-group slim-scroll" role="tablist">
                            <div class="panel panel-default">
                                <div id="sidebarNav" class="panel-collapse collapse in" role="tabpanel">
                                    <div class="panel-body">
                                        <!-- ===================================================
                                        ================= NAVIGATION Content ===================
                                        ==================================================== -->
                                        <ul id="navigation">
                                          <?php foreach($menus as $first){?>
                                            <li>
                                              <?php if(!$first["sub_menu"]){?>
                                              <a href="<?php echo $first['url'];?>"><i class="fa <?php echo $first['class'];?>"></i><span><?php echo $first["text"];?></span></a>
                                              <?php }else {?>
                                              <a role="button" tabindex="0"><i class="fa <?php echo $first['class'];?>"></i> <span><?php echo $first["text"];?></span></a>
                                              <ul>
                                                <?php foreach($first["sub_menu"] as $second){?>
                                                  <li>
                                                    <?php if(!$second["sub_menu"]){?>
                                                      <a href="<?php echo $second['url'];?>"><i class="fa fa-caret-right"></i><span><?php echo $second["text"];?></span></a>
                                                    <?php }else{?>
                                                      <a role="button" tabindex="0"><i class="fa fa-caret-right"></i> <span><?php echo $second["text"];?></span></a>
                                                      <ul>
                                                      <?php foreach($second["sub_menu"] as $third){?>
                                                        <li><a href="<?php echo $third['url'];?>"><i class="fa fa-caret-right"></i> <?php echo $third["text"];?></a></li>
                                                      <?php }?>
                                                      </ul>
                                                    <?php }?>
                                                  </li>
                                                <?php }?>
                                              </ul>
                                              <?php }?>
                                            </li>
                                          <?php } ?>
                                        </ul>
                                        <!--/ NAVIGATION Content -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
                <!--/ SIDEBAR Content -->