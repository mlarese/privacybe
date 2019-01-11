SELECT
       dm.structure_uid,
       dm.structure_name,
       dm.structure_status,
       dm.portal_uid,
       dm.portal_name,
       dm.opened_date,
       dm.opened_day,
       dm.opened_month,
       dm.opened_year,
       dm.opened_week,
       dm.opened_weekend,
       dm.opened_weekday,
       dm.checkin_date,
       dm.checkin_day,
       dm.checkin_month,
       dm.checkin_year,
       dm.checkin_week,
       dm.checkin_weekend,
       dm.checkin_weekday,
       dm.checkout_date,
       dm.checkout_day,
       dm.checkout_month,
       dm.checkout_year,
       dm.checkout_week,
       dm.checkout_weekend,
       dm.checkout_weekday,
       dm.nights,
       dm.price,
       dm.room_code,
       dm.treatment,
       dm.pax,
       dm.paxtype,
       dm.adults,
       dm.children,
       dm.infantes,
       dm.babies,
       dm.kids,
       dm.teens,
       dm.noset,
       dm.dba,
       dm.lead_time,
       dm.adr,
       dm.rev_x_pax,
       dm.status,
       dm.status_group,
       dm.origin,
       dm.original_type,
       dm.type,
       dm.rate_code,
       dm.rate,
       dm.guests,
       dm.country,
       dm.country_iso2,
       dm.country_iso3,
       dm.country_type,
       raw.reservation_origin

  FROM abs_datamart.dm_reservation_res dm
  left join abs_datawarehouse.fact_reservation_res as fact on dm.sync_code=fact.related_sync_code
  left join abs_datawarehouse.raw_reservation_res as raw on fact.related_reservation_code =raw.sync_code
  where dm.structure_uid =  'res-36'
