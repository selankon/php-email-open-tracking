-- Email Campaign table (ORIGINAL)
CREATE TABLE EmailTracker (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    campaignID int(10),
    subscriptionID int(10)
    timestamp TIMESTAMP DEFAULT NOW(),
    PRIMARY KEY (id)
);


-- USE THIS!!
CREATE TABLE EmailTracker (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    campaignID int(10),
    subscriptionID int(10),
    timestamp TIMESTAMP DEFAULT NOW(),
    ip VARCHAR(45),
    userAgent VARCHAR(255)
)
