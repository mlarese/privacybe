SELECT
       count(*) as rescount,
       sum(price) as total,
       country,
       -- opened_month,
       opened_year,
       paxtype,
      CASE
        WHEN origin = 'BOOKINGONE' AND original_type = 'RESERVATION' THEN 'BOOKINGONE'
        WHEN origin = 'CRO' AND original_type = 'OPTION' THEN 'EMAIL'
        WHEN origin = 'CRO' AND original_type = 'ENQUIRY' THEN 'EMAIL'
        ELSE 'BOOKINGONE'
       END as origin

  FROM dm_reservation_res
  where structure_uid = 'res-36'
  and type= 'RESERVATION'
  and opened_year > 2013

  group by opened_year, opened_month, country, paxtype;
