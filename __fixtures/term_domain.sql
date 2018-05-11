INSERT INTO privacy_2.domain(
   name
  ,description
  ,active
  ,deleted
) VALUES (
   'irondogline.cmsone.info' -- name - IN varchar(255)
  ,'irondogline.cmsone.info'  -- description - IN varchar(255)
  ,1 -- active - IN tinyint(1)
  ,0 -- deleted - IN tinyint(1)
);


INSERT INTO privacy_2.term_page(
   term_uid
  ,domain
  ,page
  ,deleted
) VALUES (
   'mmone-normativa-default' -- term_uid - IN varchar(255)
  ,'irondogline.cmsone.info' -- domain - IN varchar(255)
  ,'/cart_show.html' -- page - IN varchar(255)
  ,0 -- deleted - IN tinyint(1)
)
