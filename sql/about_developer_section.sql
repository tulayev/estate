alter table estate.topics
    add column logo varchar(255) null after image;

alter table estate.hotels
    add column topic_id BIGINT UNSIGNED null after ie_score,
        add constraint fk_hotels_topic_id foreign key (topic_id) references estate.topics(id);

update estate.hotels
set codename = null
where codename = '';
