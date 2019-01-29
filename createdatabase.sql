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
  situationTagId int(10),
	modelTagId int(10),
	symptomTagId int(10)
);

CREATE TABLE tags(
	tagId int(10),
    tagText text,
    tagTextPhonetic text,
		tagType int(10)
);

INSERT INTO accounts(id, email, username, password) VALUES ('0387','0587','PERSON1', 'PERSON1');

INSERT INTO accounts(id, email, username, password) VALUES ('8957','8257','PERSON2', 'PERSON2');

INSERT INTO accounts(id, email, username, password) VALUES ('4256','4556','PERSON3', 'PERSON3');

INSERT INTO accounts(id, email, username, password) VALUES ('1225','1125','PERSON4', 'PERSON4');


INSERT INTO posts(id, postID, postText, titleText) VALUES ('0387','0587','Katter är fina :)', 'one');

INSERT INTO posts(id, postID, postText, titleText) VALUES ('8957','8257','360 no scope!!! 1337!', 'one two');

INSERT INTO posts(id, postID, postText, titleText) VALUES ('4256','4556','Pasta är gott', 'one two three');

INSERT INTO posts(id, postID, postText, titleText) VALUES ('8957','4256','Kan någon swisha mig?!?! Behöver pengar till nya WOW DLC:n!!! ', 'four five');

INSERT INTO posts(id, postID, postText, titleText) VALUES ('0387','0487','Kanelbullar är mina favorit bullar', 'three');

INSERT INTO posts(id, postID, postText, titleText) VALUES ('1225','1125','Hur loggar man ut?', 'five six');

INSERT INTO posts(id, postID, postText, titleText) VALUES ('8957','8457','Minecraft är för n00bs!', 'five one');

INSERT INTO posts(id, postID, postText, titleText) VALUES ('4256','4558','Jag gillar inte fisk, det smakar bara vatten', 'seven');

INSERT INTO posts(id, postID, postText, titleText) VALUES ('8957','8967','12.57 i K/D på CoD4!!!', 'six');

INSERT INTO posts(id, postID, postText, titleText) VALUES ('4256','4446','Nu är jag magsjuk', 'one six seven');

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
