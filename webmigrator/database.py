from sqlalchemy import VARCHAR, Column, DateTime, Integer, MetaData, Table
from sqlalchemy.sql.expression import null
from sqlalchemy.sql.functions import now

md = MetaData()

guestbook = Table(
    "guestbook",
    md,
    Column("id", Integer, primary_key=True, autoincrement=True),
    Column("ip", VARCHAR, nullable=False),
    Column("name", VARCHAR, nullable=False),
    Column("text", VARCHAR, nullable=False),
    Column("approved", Integer, nullable=False, server_default="0"),
    Column("created_at", DateTime(), nullable=False, server_default="now()"),
    Column("reply", VARCHAR),
    Column("reply_at", DateTime()),
)

guestbook_blocks = Table(
    "guestbook_blocks",
    md,
    Column("id", Integer, primary_key=True, autoincrement=True),
    Column("ip", VARCHAR, nullable=False),
    Column("blocked_at", DateTime(), server_default=now()),
)

buttons = Table(
    "buttons",
    md,
    Column("id", Integer, primary_key=True, autoincrement=True),
    Column("filename", VARCHAR, nullable=False),
    Column("alt", VARCHAR, nullable=False),
    Column("url", VARCHAR),
)

views = Table(
    "views",
    md,
    Column("date", VARCHAR, primary_key=True),
    Column("views", Integer, nullable=False, server_default="0"),
)

views_expire = Table(
    "views_expire",
    md,
    Column("id", Integer, primary_key=True, autoincrement=True),
    Column("ip", VARCHAR, nullable=False),
    Column("expire", DateTime(), nullable=False, server_default="now()"),
)

socials = Table(
    "socials",
    md,
    Column("id", Integer, primary_key=True, autoincrement=True),
    Column("name", VARCHAR, nullable=False),
    Column("url", VARCHAR, nullable=False),
    Column("position", Integer, nullable=False, server_default="0"),
)

contacts = Table(
    "contacts",
    md,
    Column("id", Integer, primary_key=True, autoincrement=True),
    Column("name", VARCHAR, nullable=False),
    Column("url", VARCHAR, nullable=True),
    Column("position", Integer, nullable=False, server_default="0"),
)

kv = Table("kv", md, Column("key", VARCHAR, primary_key=True), Column("value", VARCHAR))

anonymous_messages = Table(
    "anonymous_messages",
    md,
    Column("id", Integer, primary_key=True, autoincrement=True),
    Column("ip", VARCHAR, nullable=False),
    Column("message", VARCHAR, nullable=False),
    Column("public", Integer, nullable=False),
    Column("contactType", VARCHAR, nullable=False),
    Column("contact", VARCHAR, nullable=False),
)

anonymous_messages_bans = Table(
    "anonymous_messages_bans", md, Column("ip", VARCHAR, primary_key=True)
)

project_likes = Table(
    "project_likes",
    md,
    Column("id", Integer, primary_key=True, autoincrement=True),
    Column("project", VARCHAR, nullable=False),
    Column("ip", VARCHAR, nullable=False),
)

project_comments = Table(
    "project_comments",
    md,
    Column("id", Integer, primary_key=True, autoincrement=True),
    Column("ip", VARCHAR, nullable=False),
    Column("project", VARCHAR, nullable=False),
    Column("name", VARCHAR, nullable=False),
    Column("comment", VARCHAR, nullable=False),
    Column("approved", Integer, nullable=False, server_default="0"),
)
