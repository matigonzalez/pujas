<?php

use Illuminate\Database\Migrations\Migration;

class CreateTriggers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER tr_Products_Logic_Delete_Bids_BU BEFORE UPDATE ON `products` FOR EACH ROW
            BEGIN
                UPDATE bids SET deleted = NEW.deleted where bids.id = OLD.id;
            END
        ');
        DB::unprepared('
        CREATE TRIGGER tr_User_Logic_Delete_Bids_BU BEFORE UPDATE ON `users` FOR EACH ROW
            BEGIN
                UPDATE bids SET deleted = NEW.deleted where bids.id = OLD.id;
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `tr_Products_Logic_Delete_Bids_BU`');
        DB::unprepared('DROP TRIGGER `tr_User_Logic_Delete_Bids_BU`');
    }
}
