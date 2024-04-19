USE mdesu;

INSERT INTO admin_users (pass, name) VALUES ("password", "admin_user1");
INSERT INTO admin_users (pass, name) VALUES ("password", "admin_user2");

INSERT INTO expert_users (pass, first_name, family_name, description, major)
VALUES ("password", "邊日", "派具", "子供のことならお任せください。朝から夜まで考えています。執筆経験多数です。", "こども研究科");
INSERT INTO expert_users (pass, first_name, family_name, description, major)
VALUES ("password", "expert", "user2", "hogehoge", "こども研究科");

INSERT INTO tags (name) VALUES ("妊娠期間");
INSERT INTO tags (name) VALUES ("出産準備");
INSERT INTO tags (name) VALUES ("出産後");
INSERT INTO tags (name) VALUES ("悩み相談");

INSERT INTO articles (title, content, author_id, image_path)
VALUES ("妊娠線はいつ消える？", "お腹周りを中心に稲妻のような痕が残ってしまう妊娠線を、妊娠中から警戒している方も多いはず。ここでは、妊娠線のできる理由やできやすい時期を専門医が徹底解説します。", 1, "/resources/images/articles/ninpu.png");
INSERT INTO articles (title, content, author_id, image_path)
VALUES ("article2", "content2", 2, "/resources/images/articles/ninpu.png");

INSERT INTO questions (title, content, tag_id)
VALUES ("question1", "年齢と2度の初期流産は関係があるのでしょうか？", 1);
INSERT INTO questions (title, content, tag_id)
VALUES ("question2", "妊娠初期にインフルエンザにかかってしまったのですが、胎児に影響はありますか？", 2);

INSERT INTO answers (author_id, title, content)
VALUES (1, "answer1", "自然流産の原因は、胎児側または母体側にあることもありさまざまですが、明確には分からないことが多いです。一般に、流産の発生率は10～15％とされています。連続2回の「反復流産」の発生率は2.3％で、原因は胎児側にある可能性が高く（偶発的な受精卵の染色体異常など）、自然淘汰であるとされています。反復流産までは、偶発的な流産である可能性が高く、次の妊娠の流産率は20～30％くらいです。3回連続は0.34％とされ、この場合、「習慣性流産」と診断されます。");
INSERT INTO answers (author_id, title, content) VALUES (2, "answer2", "content2");

INSERT INTO question_answer (question_id, answer_id) VALUES (1, 1);
INSERT INTO question_answer (question_id, answer_id) VALUES (2, 2);

INSERT INTO article_tag (article_id, tag_id) VALUES (1, 1);
INSERT INTO article_tag (article_id, tag_id) VALUES (1, 2);

INSERT INTO affiliate_products (name, price, brand_name, description, image_path)
VALUES ("ファーストボディオイル＆アフターボディクリーム", 11680, "NOCOR", "妊娠中のお肌を研究し続けるノコアが、「絶対に妊娠線を作りたくない！」という方たちの声に応え開発した、マタニティオイルとクリーム。入浴後にオイルを手のひらで温めて塗りながらマッサージ、その上から手のひらで温めたクリームを塗るのがオススメ！", "/resources/images/affiliate_products/cream.png");
INSERT INTO affiliate_products (name, price, brand_name, description, image_path)
VALUES ("マザーズ ボディバター", 4180, "WELEDA", "のびがよく、塗った後すぐに服を着られるほど肌に素早くなじむテクスチャー。カカオ脂やシア脂などの保湿成分のほか、妊娠中に気になりやすいつっぱり感や肌荒れにはたらきかけてくれます。", "/resources/images/affiliate_products/batter.png");

INSERT INTO article_affiliate_product (article_id, affiliate_product_id) VALUES (1, 1);
INSERT INTO article_affiliate_product (article_id, affiliate_product_id) VALUES (1, 2);
