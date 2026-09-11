"""add position to socials and contacts

Revision ID: c4f8a2b91d63
Revises: fdaaa66f7a7e
Create Date: 2026-09-11 13:00:00.000000

"""
from typing import Sequence, Union

from alembic import op
import sqlalchemy as sa


# revision identifiers, used by Alembic.
revision: str = 'c4f8a2b91d63'
down_revision: Union[str, Sequence[str], None] = 'fdaaa66f7a7e'
branch_labels: Union[str, Sequence[str], None] = None
depends_on: Union[str, Sequence[str], None] = None


def upgrade() -> None:
    """Upgrade schema."""
    op.add_column('socials', sa.Column('position', sa.Integer(), nullable=False, server_default='0'))
    op.add_column('contacts', sa.Column('position', sa.Integer(), nullable=False, server_default='0'))

    op.execute(
        """
        UPDATE socials SET position = sub.rn
        FROM (SELECT id, row_number() OVER (ORDER BY id) - 1 AS rn FROM socials) sub
        WHERE socials.id = sub.id
        """
    )
    op.execute(
        """
        UPDATE contacts SET position = sub.rn
        FROM (SELECT id, row_number() OVER (ORDER BY id) - 1 AS rn FROM contacts) sub
        WHERE contacts.id = sub.id
        """
    )


def downgrade() -> None:
    """Downgrade schema."""
    op.drop_column('contacts', 'position')
    op.drop_column('socials', 'position')
