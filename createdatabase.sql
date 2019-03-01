DROP TABLE accounts;
DROP TABLE comments;
DROP TABLE posts;
DROP TABLE posttag;
DROP TABLE tags;

CREATE TABLE accounts(
	id int(10),
    email varchar(10),
    username text,
		usernamePhonetic text,
    password text
);

CREATE TABLE comments(
	id int(10),
    commText text,
		/*commTextPhonetic text,*/
    commId int(10),
    postId int(10)
);

CREATE TABLE posts(
	id int(10),
    postId int(10),
    postText text,
		postTextPhonetic text,
    titleText text,
		titleTextPhonetic text
);

CREATE TABLE posttag(
	postId int(10),
  situationTagId text(10),
	modelTagId text(10),
	symptomTagId text(10)
);

CREATE TABLE tags(
	tagId int(10),
    tagText text,
    tagTextPhonetic text,
		tagType int(10)
);

/*INSERT INTO posttag(postID, tagId) VALUES ('0587','0001');

INSERT INTO posttag(postID, tagId) VALUES ('8257','0001');
INSERT INTO posttag(postID, tagId) VALUES ('8257','0002');

INSERT INTO posttag(postID, tagId) VALUES ('4556','0001');
INSERT INTO posttag(postID, tagId) VALUES ('4556','0002');
INSERT INTO posttag(postID, tagId) VALUES ('4556','0003');

INSERT INTO posttag(postID, tagId) VALUES ('4256','0004');
INSERT INTO posttag(postID, tagId) VALUES ('4256','0005');

INSERT INTO posttag(postID, tagId) VALUES ('0487','0003');

INSERT INTO posttag(postID, tagId) VALUES ('1125','0005');
INSERT INTO posttag(postID, tagId) VALUES ('1125','0006');

INSERT INTO posttag(postID, tagId) VALUES ('8457','0005');
INSERT INTO posttag(postID, tagId) VALUES ('8457','0001');

INSERT INTO posttag(postID, tagId) VALUES ('4558','0007');

INSERT INTO posttag(postID, tagId) VALUES ('8967','0006');

INSERT INTO posttag(postID, tagId) VALUES ('4446','0001');
INSERT INTO posttag(postID, tagId) VALUES ('4446','0006');
INSERT INTO posttag(postID, tagId) VALUES ('4446','0007'); */

/*INSERT INTO tags(tagid, tagText) VALUES ('0001',"one");
INSERT INTO tags(tagid, tagText) VALUES ('0002',"two");
INSERT INTO tags(tagid, tagText) VALUES ('0003','three');
INSERT INTO tags(tagid, tagText) VALUES ('0004','four');
INSERT INTO tags(tagid, tagText) VALUES ('0005','five');
INSERT INTO tags(tagid, tagText) VALUES ('0006','six');
INSERT INTO tags(tagid, tagText) VALUES ('0007','seven');
INSERT INTO tags(tagid, tagText) VALUES ('0008','eight');
INSERT INTO tags(tagid, tagText) VALUES ('0009','nine');*/
