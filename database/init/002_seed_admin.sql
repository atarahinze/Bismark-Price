INSERT INTO users (name, email, password, role)
VALUES (
  'Bismark Admin',
  'admin@bismark.com',
  '$2b$12$PLACEHOLDER_HASH_REPLACE_BEFORE_PRODUCTION',
  'admin'
)
ON DUPLICATE KEY UPDATE name = VALUES(name), role = VALUES(role);
