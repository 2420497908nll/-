#登录
#id 
#昵称 
#头像 
#手机号 
#邮箱号 
#密码(md5) 
#真实姓名 
#身份证号码 
#性别(1：男 2：女) 
#是否为后台管理员(0:不是 1:是 默认为0) 
#状态(是否被禁止登录 0：不是 1：是) 
#创建时间(datetime) 
#最后一次登录时间(datetime) 
#是否实名认证(0:不是 1:是)

create table user
(
	`user_id` int not null auto_increment prinary key,
	`user_name` varchar(30) not null,
	`user_img` varchar(20) not null,
	`user_telphone` int(11) null,
	`user_email` varchar(30) not null,
	`user_password` varchar(32) not null,
	`user_name_true` varchar(20) null,
	`user_card` varchar(18) null,
	`user_set` tinyint(1) not null,
	`user_is_admin` tinyint(1) default'0' not null,
	`user_is_forbidden` tinyint(1) default'0' not null,
	`user_create_time` datetime not null,
	`user_end_login` datetime not null,
	`user_is_real` tinyint(1) default'0' not null
)


#文章表(暂无评论功能  后期迭代)
# id 
#标题 
#内容 
#图片 
#创建时间 
#是否在首页滚动(最多滚动3条数据1：是 0：不是) 
#审核状态(0：待审核 1：审核通过 2：审核拒绝)
#阅读人数(后台数据统计)
#点赞个数
#user_id(创建人id) 
#type_id(文章分类id) 
#是否删除(0:不是 1：是)
#删除时间

create table list
(
	`list_id` int(11) not null auto_increment primary key,
	`list_title` varchar(100) not null,
	`list_connect` text not null,
	`list_img` varchar(60) null,
	`list_create_time` datetime not null,
	`list_is_index` tinyint(1) not null default'0',
	`list_is_examine` tinyint(1) not null default'0',
	`list_reading_number` int(11) not null default'0',
	`list_like_number` int(11) not null default'0',
	`list_user_id` int(11) not null,
	`list_type_id` int(11) not null,
	`type_is_del` tinyint(1) not null default'0',
	`list_del_time` datetime not null
)



#文章type表
#id
#类型名称
#审核状态(0：待审核 1：审核通过 2：审核拒绝)
#创建时间
#是否删除(0:不是 1：是)
#删除时间(没有删除则为null)

create table type
(
	`type_id` int(11) not null auto_increment primary key,
	`type_name` varchar(20) not null,
	`type_is_examine` tinyint(1) not null default'0',
	`type_create_time` datetime not null,
	`type_is_del` tinyint(1) not null default'0',
	`type_del_time` datetime not null
)


#点赞表
#id
#文章创建人id
#点赞文章id
#点赞人id(user_id)
#点赞时间

create table like
(
	`like_id` int(11) not null auto_increment primary key,
	`like_user_create_id` int(11) not null,
	`like_list_id` int(11) not null,
	`like_user_add_id` int(11) not null,
	`like_create_time` datetime not null
)

