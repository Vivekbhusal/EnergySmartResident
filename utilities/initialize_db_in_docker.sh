docker --tlsverify=false exec -it energysmartresident_db_1 bash -c "mysql -uroot --password=root titanium_wp_db < /temp/mysql/titanium_wp_db_v2.sql"
