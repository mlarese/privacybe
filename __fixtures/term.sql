INSERT INTO privacy.`term`(uid,
                           name,
                           pages,
						   paragraphs,
                           status,
                           published,
                           created,
                           modified,
                           suspended)
     VALUES ('3',
             'normativa_1',
             '[
        {
          "page": "/booking/index.html",
          "domain": "acme.com"
        },
        {
          "page": "/info/index.html",
          "domain": "acme.com"
        }
      ]',
             '[
        {
          "title": "do dolore dolore",
          "text": {
            "it": "sunt tempor nostrud qui tempor",
            "en": "amet exercitation labore amet officia"
          },
          "treatments": [
            {
              "name": "mollit",
              "restrictive": true,
              "mandatory": true,
              "text": {
                "it": "Lorem enim ipsum elit?",
                "en": "cupidatat sint dolor cillum?"
              }
            }
          ]
        },
        {
          "title": "est laborum pariatur",
          "text": {
            "it": "est ad aute officia mollit",
            "en": "magna quis aliquip eiusmod excepteur"
          },
          "treatments": [
            {
              "name": "esse",
              "restrictive": true,
              "mandatory": true,
              "text": {
                "it": "aute labore esse sint?",
                "en": "aliqua officia consectetur do?"
              }
            },
            {
              "name": "aliquip",
              "restrictive": false,
              "mandatory": true,
              "text": {
                "it": "Lorem quis nostrud officia?",
                "en": "reprehenderit consequat ut consectetur?"
              }
            }
          ]
        },
        {
          "title": "duis labore nostrud",
          "text": {
            "it": "eiusmod cupidatat culpa in ullamco",
            "en": "sit qui ut fugiat mollit"
          },
          "treatments": [
            {
              "name": "ad",
              "restrictive": false,
              "mandatory": true,
              "text": {
                "it": "deserunt fugiat id aliqua?",
                "en": "officia non ad amet?"
              }
            }
          ]
        }
      ]',
             'P',
             '2018-04-08 13:40:58.0',
             '2018-04-08 13:35:04.0',
             '2018-04-08 13:35:13.0',
             NULL);

COMMIT;