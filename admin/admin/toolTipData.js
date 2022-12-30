var FiltersEnabled = 0; // if your not going to use transitions or filters in any of the tips set this to 0
var spacer="&nbsp; &nbsp; &nbsp; ";

// email notifications to admin
notifyAdminNewMembers0Tip=["", spacer+"No email notifications to admin."];
notifyAdminNewMembers1Tip=["", spacer+"Notify admin only when a new member is waiting for approval."];
notifyAdminNewMembers2Tip=["", spacer+"Notify admin for all new sign-ups."];

// visitorSignup
visitorSignup0Tip=["", spacer+"If this option is selected, visitors will not be able to join this group unless the admin manually moves them to this group from the admin area."];
visitorSignup1Tip=["", spacer+"If this option is selected, visitors can join this group but will not be able to sign in unless the admin approves them from the admin area."];
visitorSignup2Tip=["", spacer+"If this option is selected, visitors can join this group and will be able to sign in instantly with no need for admin approval."];

// users table
users_addTip=["",spacer+"This option allows all members of the group to add records to the 'Users' table. A member who adds a record to the table becomes the 'owner' of that record."];

users_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Users' table."];
users_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Users' table."];
users_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Users' table."];
users_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Users' table."];

users_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Users' table."];
users_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Users' table."];
users_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Users' table."];
users_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Users' table, regardless of their owner."];

users_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Users' table."];
users_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Users' table."];
users_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Users' table."];
users_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Users' table."];

// api_shop table
api_shop_addTip=["",spacer+"This option allows all members of the group to add records to the 'Api_shop' table. A member who adds a record to the table becomes the 'owner' of that record."];

api_shop_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Api_shop' table."];
api_shop_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Api_shop' table."];
api_shop_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Api_shop' table."];
api_shop_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Api_shop' table."];

api_shop_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Api_shop' table."];
api_shop_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Api_shop' table."];
api_shop_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Api_shop' table."];
api_shop_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Api_shop' table, regardless of their owner."];

api_shop_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Api_shop' table."];
api_shop_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Api_shop' table."];
api_shop_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Api_shop' table."];
api_shop_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Api_shop' table."];

// auto_dm table
auto_dm_addTip=["",spacer+"This option allows all members of the group to add records to the 'Auto_dm' table. A member who adds a record to the table becomes the 'owner' of that record."];

auto_dm_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Auto_dm' table."];
auto_dm_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Auto_dm' table."];
auto_dm_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Auto_dm' table."];
auto_dm_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Auto_dm' table."];

auto_dm_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Auto_dm' table."];
auto_dm_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Auto_dm' table."];
auto_dm_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Auto_dm' table."];
auto_dm_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Auto_dm' table, regardless of their owner."];

auto_dm_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Auto_dm' table."];
auto_dm_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Auto_dm' table."];
auto_dm_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Auto_dm' table."];
auto_dm_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Auto_dm' table."];

// automation_scripts table
automation_scripts_addTip=["",spacer+"This option allows all members of the group to add records to the 'Automation_scripts' table. A member who adds a record to the table becomes the 'owner' of that record."];

automation_scripts_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Automation_scripts' table."];
automation_scripts_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Automation_scripts' table."];
automation_scripts_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Automation_scripts' table."];
automation_scripts_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Automation_scripts' table."];

automation_scripts_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Automation_scripts' table."];
automation_scripts_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Automation_scripts' table."];
automation_scripts_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Automation_scripts' table."];
automation_scripts_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Automation_scripts' table, regardless of their owner."];

automation_scripts_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Automation_scripts' table."];
automation_scripts_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Automation_scripts' table."];
automation_scripts_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Automation_scripts' table."];
automation_scripts_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Automation_scripts' table."];

// automation_subs table
automation_subs_addTip=["",spacer+"This option allows all members of the group to add records to the 'Automation_subs' table. A member who adds a record to the table becomes the 'owner' of that record."];

automation_subs_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Automation_subs' table."];
automation_subs_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Automation_subs' table."];
automation_subs_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Automation_subs' table."];
automation_subs_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Automation_subs' table."];

automation_subs_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Automation_subs' table."];
automation_subs_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Automation_subs' table."];
automation_subs_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Automation_subs' table."];
automation_subs_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Automation_subs' table, regardless of their owner."];

automation_subs_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Automation_subs' table."];
automation_subs_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Automation_subs' table."];
automation_subs_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Automation_subs' table."];
automation_subs_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Automation_subs' table."];

// billing table
billing_addTip=["",spacer+"This option allows all members of the group to add records to the 'Billing' table. A member who adds a record to the table becomes the 'owner' of that record."];

billing_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Billing' table."];
billing_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Billing' table."];
billing_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Billing' table."];
billing_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Billing' table."];

billing_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Billing' table."];
billing_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Billing' table."];
billing_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Billing' table."];
billing_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Billing' table, regardless of their owner."];

billing_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Billing' table."];
billing_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Billing' table."];
billing_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Billing' table."];
billing_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Billing' table."];

// bot_control table
bot_control_addTip=["",spacer+"This option allows all members of the group to add records to the 'Bot_control' table. A member who adds a record to the table becomes the 'owner' of that record."];

bot_control_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Bot_control' table."];
bot_control_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Bot_control' table."];
bot_control_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Bot_control' table."];
bot_control_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Bot_control' table."];

bot_control_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Bot_control' table."];
bot_control_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Bot_control' table."];
bot_control_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Bot_control' table."];
bot_control_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Bot_control' table, regardless of their owner."];

bot_control_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Bot_control' table."];
bot_control_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Bot_control' table."];
bot_control_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Bot_control' table."];
bot_control_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Bot_control' table."];

// campaign_engine table
campaign_engine_addTip=["",spacer+"This option allows all members of the group to add records to the 'Campaign_engine' table. A member who adds a record to the table becomes the 'owner' of that record."];

campaign_engine_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Campaign_engine' table."];
campaign_engine_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Campaign_engine' table."];
campaign_engine_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Campaign_engine' table."];
campaign_engine_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Campaign_engine' table."];

campaign_engine_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Campaign_engine' table."];
campaign_engine_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Campaign_engine' table."];
campaign_engine_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Campaign_engine' table."];
campaign_engine_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Campaign_engine' table, regardless of their owner."];

campaign_engine_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Campaign_engine' table."];
campaign_engine_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Campaign_engine' table."];
campaign_engine_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Campaign_engine' table."];
campaign_engine_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Campaign_engine' table."];

// client_api table
client_api_addTip=["",spacer+"This option allows all members of the group to add records to the 'Client_api' table. A member who adds a record to the table becomes the 'owner' of that record."];

client_api_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Client_api' table."];
client_api_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Client_api' table."];
client_api_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Client_api' table."];
client_api_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Client_api' table."];

client_api_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Client_api' table."];
client_api_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Client_api' table."];
client_api_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Client_api' table."];
client_api_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Client_api' table, regardless of their owner."];

client_api_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Client_api' table."];
client_api_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Client_api' table."];
client_api_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Client_api' table."];
client_api_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Client_api' table."];

// engine_monitor table
engine_monitor_addTip=["",spacer+"This option allows all members of the group to add records to the 'Engine_monitor' table. A member who adds a record to the table becomes the 'owner' of that record."];

engine_monitor_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Engine_monitor' table."];
engine_monitor_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Engine_monitor' table."];
engine_monitor_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Engine_monitor' table."];
engine_monitor_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Engine_monitor' table."];

engine_monitor_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Engine_monitor' table."];
engine_monitor_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Engine_monitor' table."];
engine_monitor_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Engine_monitor' table."];
engine_monitor_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Engine_monitor' table, regardless of their owner."];

engine_monitor_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Engine_monitor' table."];
engine_monitor_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Engine_monitor' table."];
engine_monitor_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Engine_monitor' table."];
engine_monitor_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Engine_monitor' table."];

// history table
history_addTip=["",spacer+"This option allows all members of the group to add records to the 'History' table. A member who adds a record to the table becomes the 'owner' of that record."];

history_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'History' table."];
history_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'History' table."];
history_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'History' table."];
history_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'History' table."];

history_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'History' table."];
history_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'History' table."];
history_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'History' table."];
history_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'History' table, regardless of their owner."];

history_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'History' table."];
history_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'History' table."];
history_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'History' table."];
history_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'History' table."];

// logs table
logs_addTip=["",spacer+"This option allows all members of the group to add records to the 'Logs' table. A member who adds a record to the table becomes the 'owner' of that record."];

logs_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Logs' table."];
logs_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Logs' table."];
logs_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Logs' table."];
logs_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Logs' table."];

logs_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Logs' table."];
logs_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Logs' table."];
logs_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Logs' table."];
logs_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Logs' table, regardless of their owner."];

logs_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Logs' table."];
logs_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Logs' table."];
logs_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Logs' table."];
logs_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Logs' table."];

// process_engine table
process_engine_addTip=["",spacer+"This option allows all members of the group to add records to the 'Process_engine' table. A member who adds a record to the table becomes the 'owner' of that record."];

process_engine_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Process_engine' table."];
process_engine_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Process_engine' table."];
process_engine_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Process_engine' table."];
process_engine_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Process_engine' table."];

process_engine_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Process_engine' table."];
process_engine_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Process_engine' table."];
process_engine_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Process_engine' table."];
process_engine_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Process_engine' table, regardless of their owner."];

process_engine_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Process_engine' table."];
process_engine_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Process_engine' table."];
process_engine_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Process_engine' table."];
process_engine_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Process_engine' table."];

// pts_conversion table
pts_conversion_addTip=["",spacer+"This option allows all members of the group to add records to the 'Pts_conversion' table. A member who adds a record to the table becomes the 'owner' of that record."];

pts_conversion_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Pts_conversion' table."];
pts_conversion_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Pts_conversion' table."];
pts_conversion_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Pts_conversion' table."];
pts_conversion_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Pts_conversion' table."];

pts_conversion_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Pts_conversion' table."];
pts_conversion_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Pts_conversion' table."];
pts_conversion_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Pts_conversion' table."];
pts_conversion_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Pts_conversion' table, regardless of their owner."];

pts_conversion_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Pts_conversion' table."];
pts_conversion_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Pts_conversion' table."];
pts_conversion_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Pts_conversion' table."];
pts_conversion_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Pts_conversion' table."];

// system_cookies table
system_cookies_addTip=["",spacer+"This option allows all members of the group to add records to the 'System_cookies' table. A member who adds a record to the table becomes the 'owner' of that record."];

system_cookies_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'System_cookies' table."];
system_cookies_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'System_cookies' table."];
system_cookies_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'System_cookies' table."];
system_cookies_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'System_cookies' table."];

system_cookies_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'System_cookies' table."];
system_cookies_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'System_cookies' table."];
system_cookies_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'System_cookies' table."];
system_cookies_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'System_cookies' table, regardless of their owner."];

system_cookies_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'System_cookies' table."];
system_cookies_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'System_cookies' table."];
system_cookies_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'System_cookies' table."];
system_cookies_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'System_cookies' table."];

// system_tokens table
system_tokens_addTip=["",spacer+"This option allows all members of the group to add records to the 'System_tokens' table. A member who adds a record to the table becomes the 'owner' of that record."];

system_tokens_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'System_tokens' table."];
system_tokens_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'System_tokens' table."];
system_tokens_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'System_tokens' table."];
system_tokens_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'System_tokens' table."];

system_tokens_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'System_tokens' table."];
system_tokens_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'System_tokens' table."];
system_tokens_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'System_tokens' table."];
system_tokens_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'System_tokens' table, regardless of their owner."];

system_tokens_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'System_tokens' table."];
system_tokens_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'System_tokens' table."];
system_tokens_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'System_tokens' table."];
system_tokens_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'System_tokens' table."];

// tester table
tester_addTip=["",spacer+"This option allows all members of the group to add records to the 'Tester' table. A member who adds a record to the table becomes the 'owner' of that record."];

tester_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Tester' table."];
tester_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Tester' table."];
tester_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Tester' table."];
tester_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Tester' table."];

tester_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Tester' table."];
tester_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Tester' table."];
tester_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Tester' table."];
tester_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Tester' table, regardless of their owner."];

tester_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Tester' table."];
tester_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Tester' table."];
tester_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Tester' table."];
tester_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Tester' table."];

// tweet_factory table
tweet_factory_addTip=["",spacer+"This option allows all members of the group to add records to the 'Tweet_factory' table. A member who adds a record to the table becomes the 'owner' of that record."];

tweet_factory_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Tweet_factory' table."];
tweet_factory_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Tweet_factory' table."];
tweet_factory_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Tweet_factory' table."];
tweet_factory_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Tweet_factory' table."];

tweet_factory_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Tweet_factory' table."];
tweet_factory_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Tweet_factory' table."];
tweet_factory_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Tweet_factory' table."];
tweet_factory_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Tweet_factory' table, regardless of their owner."];

tweet_factory_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Tweet_factory' table."];
tweet_factory_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Tweet_factory' table."];
tweet_factory_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Tweet_factory' table."];
tweet_factory_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Tweet_factory' table."];

// twitter_logs table
twitter_logs_addTip=["",spacer+"This option allows all members of the group to add records to the 'Twitter_logs' table. A member who adds a record to the table becomes the 'owner' of that record."];

twitter_logs_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Twitter_logs' table."];
twitter_logs_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Twitter_logs' table."];
twitter_logs_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Twitter_logs' table."];
twitter_logs_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Twitter_logs' table."];

twitter_logs_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Twitter_logs' table."];
twitter_logs_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Twitter_logs' table."];
twitter_logs_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Twitter_logs' table."];
twitter_logs_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Twitter_logs' table, regardless of their owner."];

twitter_logs_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Twitter_logs' table."];
twitter_logs_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Twitter_logs' table."];
twitter_logs_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Twitter_logs' table."];
twitter_logs_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Twitter_logs' table."];

// usage_track table
usage_track_addTip=["",spacer+"This option allows all members of the group to add records to the 'Usage_track' table. A member who adds a record to the table becomes the 'owner' of that record."];

usage_track_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Usage_track' table."];
usage_track_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Usage_track' table."];
usage_track_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Usage_track' table."];
usage_track_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Usage_track' table."];

usage_track_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Usage_track' table."];
usage_track_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Usage_track' table."];
usage_track_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Usage_track' table."];
usage_track_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Usage_track' table, regardless of their owner."];

usage_track_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Usage_track' table."];
usage_track_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Usage_track' table."];
usage_track_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Usage_track' table."];
usage_track_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Usage_track' table."];

// user_earnings table
user_earnings_addTip=["",spacer+"This option allows all members of the group to add records to the 'User_earnings' table. A member who adds a record to the table becomes the 'owner' of that record."];

user_earnings_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'User_earnings' table."];
user_earnings_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'User_earnings' table."];
user_earnings_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'User_earnings' table."];
user_earnings_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'User_earnings' table."];

user_earnings_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'User_earnings' table."];
user_earnings_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'User_earnings' table."];
user_earnings_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'User_earnings' table."];
user_earnings_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'User_earnings' table, regardless of their owner."];

user_earnings_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'User_earnings' table."];
user_earnings_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'User_earnings' table."];
user_earnings_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'User_earnings' table."];
user_earnings_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'User_earnings' table."];

/*
	Style syntax:
	-------------
	[TitleColor,TextColor,TitleBgColor,TextBgColor,TitleBgImag,TextBgImag,TitleTextAlign,
	TextTextAlign,TitleFontFace,TextFontFace, TipPosition, StickyStyle, TitleFontSize,
	TextFontSize, Width, Height, BorderSize, PadTextArea, CoordinateX , CoordinateY,
	TransitionNumber, TransitionDuration, TransparencyLevel ,ShadowType, ShadowColor]

*/

toolTipStyle=["white","#00008B","#000099","#E6E6FA","","images/helpBg.gif","","","","\"Trebuchet MS\", sans-serif","","","","3",400,"",1,2,10,10,51,1,0,"",""];

applyCssFilter();
