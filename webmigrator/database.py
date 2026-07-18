from sqlalchemy import VARCHAR, Column, DateTime, Integer, MetaData, Table
from sqlalchemy.sql.functions import now

md = MetaData()

anonymous_messages = Table(
    "anonymous_messages",
    md,
    Column("id", Integer, primary_key=True, autoincrement=True),
    Column("ip", VARCHAR, nullable=False),
    Column("text", VARCHAR, nullable=False),
)

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
)

contacts = Table(
    "contacts",
    md,
    Column("id", Integer, primary_key=True, autoincrement=True),
    Column("name", VARCHAR, nullable=False),
    Column("url", VARCHAR, nullable=True),
)

projects = Table(
    "projects",
    md,
    Column("id", Integer, primary_key=True, autoincrement=True),
    Column("name", VARCHAR, nullable=False),
    Column("description", VARCHAR, nullable=False),
    Column("url", VARCHAR, nullable=False),
)

kv = Table("kv", md, Column("key", VARCHAR, primary_key=True), Column("value", VARCHAR))

updates = Table(
    "updates",
    md,
    Column("id", Integer, primary_key=True, autoincrement=True),
    Column("title", VARCHAR, nullable=False),
    Column("body", VARCHAR, nullable=False),
    Column("url", VARCHAR),
    Column("created_at", DateTime(), server_default=now(), nullable=False),
)
