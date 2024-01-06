 
好的，我们先创建三个表：properties、rooms 和 inventory。请注意，下面的示例表结构是一个基本的示例，你可能需要根据你的实际需求进行适当的修改。

sql
Copy code
-- 创建 properties 表
CREATE TABLE properties (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- 创建 rooms 表
CREATE TABLE rooms (
    id INT AUTO_INCREMENT PRIMARY KEY,
    property_id INT,
    room_number VARCHAR(50) NOT NULL,
    capacity INT NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (property_id) REFERENCES properties(id)
);

-- 创建 inventory 表
CREATE TABLE inventory (
    id INT AUTO_INCREMENT PRIMARY KEY,
    room_id INT,
    date DATE NOT NULL,
    available_stock INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (room_id) REFERENCES rooms(id)
);
接下来，我们添加一些示例数据。请注意，这只是一个示例，你可能需要根据你的实际情况进行适当的修改。

sql
Copy code
-- 插入 properties 数据
INSERT INTO properties (name, address, description) VALUES
('Property A', '123 Main St', 'A beautiful property near the beach'),
('Property B', '456 Oak St', 'A cozy retreat in the mountains');

-- 插入 rooms 数据
INSERT INTO rooms (property_id, room_number, capacity, description) VALUES
(1, '101', 2, 'Standard Room with a view'),
(1, '102', 4, 'Suite with oceanfront balcony'),
(2, '201', 3, 'Mountain-view cabin'),
(2, '202', 2, 'Cozy cottage with fireplace');

-- 插入 inventory 数据
-- 以 room_id 为1的房间为例，插入一周的库存数据（假设从今天算起）
-- 插入 inventory 数据 -- 以 room_id 为1的房间为例，插入一周的库存数据（假设从今天算起） INSERT INTO inventory (room_id, date, available_stock) VALUES (1, CURDATE(), 3), (1, DATE_ADD(CURDATE(), INTERVAL 1 DAY), 2), (1, DATE_ADD(CURDATE(), INTERVAL 2 DAY), 4), (1, DATE_ADD(CURDATE(), INTERVAL 3 DAY), 1), (1, DATE_ADD(CURDATE(), INTERVAL 4 DAY), 3), (1, DATE_ADD(CURDATE(), INTERVAL 5 DAY), 2), (1, DATE_ADD(CURDATE(), INTERVAL 6 DAY), 3)

 php artisan db:seed
 php artisan graphql-playground:download-assets



query FetchUser {
  user(id: 1) {
    id
    name

    # Add other fields you want to retrieve
  }
}


 query CombinedQueries {
  availableRooms(checkInDate: "2024-01-10", checkOutDate: "2024-01-15", adults: 2) {
    room
    availableDates
  }

}
